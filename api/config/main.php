<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'homeUrl' => '/',
    'language' => 'ru',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
            'baseUrl' => '/api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\ApiUser',
            'enableSession' => false,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api'],
        ],
        'response' => [
            'format' =>  \yii\web\Response::FORMAT_JSON
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-api',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'error-logs/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'class'=>'api\components\LanguageUrlManager',
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            ]
        ],

    ],
    'params' => $params,
];
