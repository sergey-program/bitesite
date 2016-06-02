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
        return $this->render('index');
    }
}