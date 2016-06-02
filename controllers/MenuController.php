<?php

namespace app\controllers;

use app\controllers\extend\AbstractController;
use app\models\Estate;
use yii\web\Response;

/**
 * Class MenuController
 *
 * @package app\controllers
 */
class MenuController extends AbstractController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return array
     */
    public function actionGetDropdown()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $term = \Yii::$app->request->get('term');

        /** @var Estate[] $estates */
        $estates = Estate::find()->where(['like', 'description', $term])->all();
        $return = [];

        foreach ($estates as $estate) {
            $return[] = ['id' => $estate->id, 'value' => $estate->description, 'label' => $estate->description];
        }

        return $return;
    }
}