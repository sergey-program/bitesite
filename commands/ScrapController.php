<?php

namespace app\commands;

use app\helpers\scraper\Scraper;
use yii\console\Controller;

/**
 * Class ScrapController
 *
 * @package app\commands
 */
class ScrapController extends Controller
{
    /**
     *
     */
    public function actionRun()
    {
        $scraper = new Scraper();
        $html = $scraper->authenticate()->page(1);

        Scraper::parse($html);
    }
}
