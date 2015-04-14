<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
//            'baseUrl' => '/',
//            'scriptUrl' => 'index.php',
            'showScriptName' => false,
            'rules' => [

                'player/<id:\d+>' => 'player/view',
                'player/<id:\d+>/<controller:\w+>' => 'player/<controller>',
                'team/<id:\d+>' => 'team/view',
                'team/<id:\d+>/<controller:\w+>' => 'team/<controller>',
                'competition/<id:\d+>' => 'competition/view',
//                'competition/<id:\d+>/<controller:\w+>' => 'team/<controller>',
                '<controller>' => '<controller>/index',
//                'news' => 'article/index',
                '<category:(contacts|about|leadership)>' => 'article/single',
                '<category:(news|history|official|media)>' => 'article/index',
                '<category:(news|history|official|media)>/<id>' => 'article/view',
            ],
        ],
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
