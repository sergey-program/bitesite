<?php

namespace app\helpers\scraper\actions;

use app\helpers\scraper\extend\AbstractAction;
use yii\base\UnknownPropertyException;

/**
 * Class Authentication
 *
 * @package app\helpers\scraper\actions
 *
 * @property string|null $username
 * @property string|null $password
 * @property string|null $url
 */
class Authentication extends AbstractAction
{
    private $username;
    private $password;
    private $url;

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Login page\form url.
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     *
     */
    public function run()
    {
        if (!$this->username || !$this->password || !$this->url) {
            throw new UnknownPropertyException('Not all properties were set.');
        }

        curl_setopt($this->getCurl(), CURLOPT_URL, $this->url);
        curl_setopt($this->getCurl(), CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($this->getCurl(), CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->getCurl(), CURLOPT_FOLLOWLOCATION, true);
        $htmlPageLogin = curl_exec($this->getCurl());

        $dom = new \DOMDocument();
        $dom->loadHTML($htmlPageLogin);

        // also we can get it from meta, but we parsing a login form
        $xPath = new \DOMXPath($dom);
        $csrf = $xPath->query('//input[contains(@name, "_csrf")]')->item(0)->getAttribute('value');

        curl_setopt($this->getCurl(), CURLOPT_POST, 1);
        curl_setopt($this->getCurl(), CURLOPT_POSTFIELDS, 'LoginForm[email]=' . $this->username . '&LoginForm[password]=' . $this->password . '&LoginForm[rememberMe]=1&_csrf=' . $csrf);
        curl_exec($this->getCurl());

        return $this;
    }
}