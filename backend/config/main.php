<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
    ],
    'components' => [
        'request' => [
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true,
            'baseUrl' => '/backend/web/'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
//            'baseUrl' => '/backend/web/',
//            'scriptUrl' => 'index.php',
            'showScriptName' => false,
        ],
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'baseUrl' => '/admin',
//            'scriptUrl' => '/admin/index.php',
//            'showScriptName' => false,
//            'rules' => [
//// your rules go here
//            ],
////  ...
//        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
