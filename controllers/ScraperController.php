<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;

/**
 * Class ScraperController
 *
 * @package app\controllers
 */
class ScraperController extends AbstractController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', ['content' => '']);
    }

    public function actionLogin()
    {
        $curlHandle = $this->getCurlHandleLogin('http://rent-scaner.ru/login');

        $content = $this->getPage($curlHandle, 1);

        $this->parsePageListing($content);
        $content = '';

        return $this->render('index', ['content' => $content]);
    }

    private function getCurlHandleLogin($url)
    {
        libxml_use_internal_errors(true);

        $username = 'zimukera@mswork.ru';
        $password = '123321qwe';

        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, true);
        $pageLogin = curl_exec($curlHandle);

        $dom = new \DOMDocument();
        $dom->loadHTML($pageLogin);

        $xPath = new \DOMXPath($dom);

        $inputCsrf = $xPath->query('//input[contains(@name, "_csrf")]');
        $csrf = $inputCsrf->item(0)->getAttribute('value');

        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'LoginForm[email]=' . $username . '&LoginForm[password]=' . $password . '&LoginForm[rememberMe]=1&_csrf=' . $csrf);
        curl_exec($curlHandle);

        return $curlHandle;
    }

    private function getPage($curlHandle, $page = 1)
    {
        // http://rent-scaner.ru/estate?page=2&per-page=50
        curl_setopt($curlHandle, CURLOPT_URL, 'http://rent-scaner.ru/estate?page=' . $page . '&per-page=50');
        curl_setopt($curlHandle, CURLOPT_POST, 0);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, null);

        $content = curl_exec($curlHandle);

        return $content;

    }

    private function parsePageListing($html)
    {

        $dom = new \DOMDocument();
        $dom->loadHTML($html);

        $xPath = new \DOMXPath($dom);

        $trs = $xPath->query('//div[contains(@id, "advert-list-container")]/table/tbody/tr[contains(@class, "detailed-advert")]');

        for ($i = 0; $i < $trs->length; $i++) {
            $tr = $trs->item($i);
            echo $tr->getAttribute('data-key') . '<br/>';

            $cols = $xPath->query('.//td/div/div[contains(@class,"row")]/div', $tr);

            $col1 = $cols->item(0);
            $col2 = $cols->item(1);
            $col3 = $cols->item(2);
            $col4 = $cols->item(3);


            $description = $xPath->query('.//div[contains(@class, "trunk8-description")]', $col1);
            $description = (string)$description->item(0)->nodeValue;

            echo 'Description<br/>';
            echo '<pre>';
            print_r($description);
            echo '</pre>';

            $col1rows = $xPath->query('.//div[contains(@class, "row")]', $col1);
            $col1row3 = $col1rows->item(2);

            $addressAndDistrict = $xPath->query('.//div[contains(@class,"col-md-6")]', $col1row3);
            $addressAndDistrict = $addressAndDistrict->item(0)->ownerDocument->saveHTML($addressAndDistrict->item(0));

            // address, source, disctrict photos
            echo 'Address:<br/>';
            echo '<pre>';
            print_r($addressAndDistrict);
            echo '</pre>';

            $sourceAndPhotos = $xPath->query('.//div[contains(@class,"col-md-6")]', $col1row3);
            $sourceAndPhotos = $sourceAndPhotos->item(1)->ownerDocument->saveHTML($sourceAndPhotos->item(1));

            $priceAndData = $col2->ownerDocument->saveHTML($col2);

            echo 'Price:<br/>';
            echo '<pre>';
            print_r($priceAndData);
            echo '</pre>';

            $contacts = $col3->ownerDocument->saveHTML($col3);

            echo 'Contacts:<br/>';
            echo '<pre>';
            print_r($contacts);
            echo '</pre>';

            echo '<hr/>';
        }

    }
}