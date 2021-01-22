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
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'backend\assets\AdminAsset',
    ];
}
