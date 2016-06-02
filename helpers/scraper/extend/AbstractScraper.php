<?php

namespace app\helpers\scraper\extend;

/**
 * Class AbstractScraper
 *
 * @package app\helpers\scraper\extend
 */
abstract class AbstractScraper
{
    /**
     * AbstractScraper constructor.
     */
    public function __construct()
    {
        libxml_use_internal_errors(true);
    }
}