<?php

namespace app\helpers\scraper\actions;

use app\helpers\scraper\extend\AbstractAction;
use yii\base\UnknownPropertyException;

/**
 * Class Page
 *
 * @package app\helpers\scraper\actions
 *
 * @property int $pageNumber
 */
class Page extends AbstractAction
{
    public $pageNumber = 1;

    /**
     * @param int $pageNumber
     *
     * @return $this
     */
    public function setPage($pageNumber = 1)
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    /**
     * @return string
     * @throws UnknownPropertyException
     */
    public function run()
    {
        if (!is_numeric($this->pageNumber) || !$this->getCurl()) {
            throw new UnknownPropertyException('Some properties are invalid.');
        }

        // http://rent-scaner.ru/estate?page=2&per-page=50
        curl_setopt($this->getCurl(), CURLOPT_URL, 'http://rent-scaner.ru/estate?page=' . $this->pageNumber . '&per-page=50');
        curl_setopt($this->getCurl(), CURLOPT_POST, 0);
        curl_setopt($this->getCurl(), CURLOPT_POSTFIELDS, null);

        return curl_exec($this->getCurl());
    }
}

