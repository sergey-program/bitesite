<?php

namespace app\helpers\scraper\actions;

use app\models\Estate;
use yii\base\Exception;
use yii\base\UnknownPropertyException;

/**
 * Class Parser
 *
 * @package app\helpers\scraper\actions
 *
 * @property string|null $html
 * @property resource    $dom
 * @property Estate      $model
 */
class Parser
{
    public $html;

    /**
     * @param string $credential
     *
     * @return Estate|null|static
     * @throws Exception
     */
    public function createModel($credential)
    {
        $model = Estate::findOne(['credential' => $credential]);

        if (!$model) {
            $model = new Estate();
            $model->credential = $credential;

            if (!$model->save()) {
                return false;
            }
        }

        return $model;
    }

    /**
     * @param string $html
     *
     * @return $this
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    public function run()
    {
        if (!$this->html) {
            throw new UnknownPropertyException('Html cannot be null.');
        }

        $dom = new \DOMDocument();
        $dom->loadHTML($this->html);

        $xPath = new \DOMXPath($dom);

        $trs = $xPath->query('//div[contains(@id, "advert-list-container")]/table/tbody/tr[contains(@class, "detailed-advert")]');

        for ($i = 0; $i < $trs->length; $i++) {
            $tr = $trs->item($i);

            $model = $this->createModel($this->prepareValue($tr->getAttribute('data-key')));

            if (!$model) {
                continue;
            }

            $cols = $xPath->query('.//td/div/div[contains(@class,"row")]/div', $tr);

            $col1 = $cols->item(0);
            $col2 = $cols->item(1);
            $col3 = $cols->item(2);

            $description = $xPath->query('.//div[contains(@class, "trunk8-description")]', $col1);
            $model->description = $this->prepareValue($description->item(0)->nodeValue);

            $col1rows = $xPath->query('.//div[contains(@class, "row")]', $col1);
            $col1row3 = $col1rows->item(2);

            $addressAndDistrict = $xPath->query('.//div[contains(@class,"col-md-6")]', $col1row3);
            $addressAndDistrict = explode('Район:', $this->prepareValue($addressAndDistrict->item(0)->nodeValue));
            $addressAndDistrict[0] = str_replace('Адрес:', '', $addressAndDistrict[0]);

            $model->address = $this->prepareValue($addressAndDistrict[0]);
            $model->district = $this->prepareValue($addressAndDistrict[1]);

            $sourceAndPhotos = $xPath->query('.//div[contains(@class,"col-md-6")]', $col1row3);
            $photos = $xPath->query('.//a[contains(@data-lightbox, "t")]', $sourceAndPhotos->item(1));

            $model->images = null;

            if ($photos->length) {
                foreach ($photos as $photo) {
                    $model->images .= $this->prepareValue($photo->getAttribute('href')) . ';';
                }
            }

            $keywords = ['Цена:', 'Тип:', 'Комнат:', 'Площадь:', 'Этаж:', 'Этажность:'];
            $array = explode($keywords[0], str_replace($keywords, $keywords[0], $this->prepareValue($col2->nodeValue)));
            $model->price = trim(str_replace(' ', '', str_replace('руб.', '', $array[1])));
            $model->type = $this->prepareValue($array[2]);
            $model->rooms = $this->prepareValue($array[3]);
            $model->square = $this->prepareValue($array[4]);
            $model->level = $this->prepareValue($array[5]);
            $model->maxLevel = $this->prepareValue($array[6]);
            $model->contact = $this->prepareValue($col3->nodeValue);
            $model->save();

            echo '<hr/>';
        }
    }

    /**
     * @param string $string
     *
     * @return string
     */
    private function prepareValue($string)
    {
        return trim((string)$string);
    }
}