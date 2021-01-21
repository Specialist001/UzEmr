<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/medical';
    public $baseUrl = '@web/medical';
    public $css = [
        'css/bootstrap.min.css',
        'css/typography.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.appear.js',
        'js/wow.min.js',
        'js/core.js',
        'js/animated.js',
        'js/custom.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
