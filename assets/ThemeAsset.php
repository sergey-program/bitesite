<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class ThemeAsset
 *
 * @package app\assets
 */
class ThemeAsset extends AssetBundle
{
    public $basePath = '@webroot/theme';
    public $baseUrl = '@web/theme';
    public $css = [
        'bootstrap.min.css',
        'sequencejs-qubico.css',
        'font-awesome-4.6.3/css/font-awesome.min.css',
        'flexslider.css',
        'colorbox.css',
        'qubico.css',
        'qubico-cyan.css',
        'style-switcher.css'
    ];

    public $js = [
        'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js',
        'respond.min.js',
        'modernizr.min.js',
        'bootstrap.min.js',
        'jquery.scrollto.js',
        'jquery.easing.1.3.min.js',
        'jquery.flexslider.min.js',
        'jquery.fitvids.js',
        'jquery.fittext.js',
        'waypoints.min.js',
        'jquery.countTo.js',
        'jquery.easypiechart.js',
        'jquery.sequence-min.js',
        'jquery.colorbox-min.js',
        'contact.js',
        'qubico.js',
        'style-switcher.js',

    ];
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];

//    public $depends = [
//        'yii\web\JqueryAsset'
//    ];
}