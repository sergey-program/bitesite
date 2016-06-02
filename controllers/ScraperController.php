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
        if (\Yii::$app->request->isPost) {
            $scraper = new Scraper();
            $html = $scraper->authenticate()->page(1);

            Scraper::parse($html);

            return $this->redirect(['estate/list']);
        }

        return $this->render('index');
    }
}