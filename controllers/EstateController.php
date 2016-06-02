<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\models\Estate;

/**
 * Class EstateController
 *
 * @package app\controllers
 */
class EstateController extends AbstractController
{
    /**
     * @return string
     */
    public function actionList()
    {
        $estates = Estate::find()->all();

        return $this->render('list', ['estates' => $estates]);
    }
}