<?php

namespace app\helpers\scraper\extend;

/**
 * Class AbstractAction
 *
 * @package app\helpers\scraper\extend
 *
 * @property resource|null $curl
 */
abstract class AbstractAction
{
    private $curl;

    /**
     * @param resource $curl
     *
     * @return $this
     */
    public function setCurl($curl)
    {
        $this->curl = $curl;

        return $this;
    }

    /**
     * @return null|resource
     */
    public function getCurl()
    {
        return $this->curl;
    }

    /**
     * Init empty curl resource, without any params.
     *
     * @return $this
     */
    public function initCurl()
    {
        $this->curl = curl_init();

        return $this;
    }
}