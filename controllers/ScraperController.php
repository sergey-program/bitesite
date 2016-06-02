<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\helpers\scraper\Scraper;

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

    public function actionGo()
    {
        $scraper = new Scraper();
        $html = $scraper->authenticate()->page(1);

        Scraper::parse($html);

        $content = '';

        return $this->render('index', ['content' => $content]);
    }


}