<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;

/**
 * Class ThemeController
 *
 * @package app\controllers
 */
class ThemeController extends AbstractController
{
    public $layout = 'theme';
    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()->title = 'Qubico | One-Page Creative Portfolio';
        return $this->render('index');
    }
}