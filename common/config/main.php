<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    'timezone' => 'Asia/Yekaterinburg',
    'components' => [
//        'authManager' => [
//            'class' => 'yii\rbac\DbManager',
//            'defaultRoles' => ['manager', 'user', 'admin'], //здесь прописываем роли
//            //зададим куда будут сохраняться наши файлы конфигураций RBAC
////            'itemFile' => '/@common/components/rbac/items.php',
////            'assignmentFile' => '/@common/components/rbac/assignments.php',
////            'ruleFile' => '/@common/components/rbac/rules.php'
//        ],
//        'authManager' => [
//            'class' => \yii\filters\AccessControl::className(),
//            
//        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=minion_hck2',
            'username' => "minion_hck2",
            'password' => '2pYY[476',
            'charset' => 'utf8',
            'schemaCache' => 'cache',
            'schemaCacheDuration' => '3600',
            'enableSchemaCache' => true,
//            'on afterOpen' => function($event) {
////                 $event->sender->createCommand("SET time_zone = '+06:00'")->execute();
//            },
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin', 'player', 'player', 'registered'], // Здесь нет роли "guest", т.к. эта роль виртуальная и не присутствует в модели UserExt
        ],
        'formatter' => [
            'dateFormat' => 'php:d.m.Y H:i',
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
