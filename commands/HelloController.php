<?php

namespace app\commands;

use yii\console\Controller;

/**
 * Class HelloController
 *
 * @package app\commands
 */
class HelloController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        echo 'some action';
    }
}
