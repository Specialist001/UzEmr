<?php


namespace backend\assets;


use yii\web\AssetBundle;

class SelectAsset extends AssetBundle
{
    public $basePath = '@webroot/medical';
    public $baseUrl = '@web/medical';
    public $css = [
        'css/select2.min.css',
    ];
    public $js = [
        'js/select2.min.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
        'backend\assets\AppAsset',
    ];
}