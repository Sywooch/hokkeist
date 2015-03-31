<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    'timezone' => 'Asia/Yekaterinburg',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin', 'player', 'player', 'registered'], // Здесь нет роли "guest", т.к. эта роль виртуальная и не присутствует в модели UserExt
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'RUR',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
                'list/<listName:[a-z\-]+>' => 'list/index'
            ]
        ],
    ],
];
