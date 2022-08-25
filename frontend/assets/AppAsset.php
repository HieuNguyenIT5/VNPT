<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    
    public $js = [
        'js/jquery-2.2.4.min.js',
        'https://unpkg.com/vue@3',
        'js/carousel/owl.carousel.js',
        // 'js/main.js',
        'http://code.highcharts.com/highcharts.js'
    ];
    public $css = [
        'css/site.css',
        'css/carousel/carousel.css',
        'css/carousel/owl.carousel.css',
        'css/carousel/owl.theme.css',
        'css/carousel/carousel.css',
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
