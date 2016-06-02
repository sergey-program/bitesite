<?php

namespace app\helpers\scraper;

use app\helpers\scraper\actions\Authentication;
use app\helpers\scraper\actions\Page;
use app\helpers\scraper\actions\Parser;
use app\helpers\scraper\extend\AbstractScraper;

/**
 * Class Scraper
 *
 * @package app\helpers\scraper
 */
class Scraper extends AbstractScraper
{
    public $authentication;
    public $page;
    public $parser;

    /**
     * Scraper constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->authentication = new Authentication();
        $this->authentication->initCurl();

        $this->page = new Page();
        $this->parser = new Parser();
    }

    /**
     * @throws \yii\base\UnknownPropertyException
     */
    public function authenticate()
    {
        $this->authentication
            ->setUrl('http://rent-scaner.ru/login')
            ->setUsername(\Yii::$app->params['scraper']['siteName']['username'])
            ->setPassword(\Yii::$app->params['scraper']['siteName']['password'])
            ->run();

        return $this;
    }

    public function page($page = 1)
    {
        $this->page->setCurl($this->authentication->getCurl());

        return $this->page->setPage($page)->run();
    }

    public static function parse($html)
    {
        $parser = new Parser();
        $parser->setHtml($html)->run();
    }
}