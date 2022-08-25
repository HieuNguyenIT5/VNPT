<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://use.fontawesome.com/releases/v6.1.2/css/all.css",
        'css/site.css',
    ];
    public $js = [
        "https://unpkg.com/vue@3",
        "tinymce/tinymce.min.js",
        "js/main.js", 
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
