<?php

return [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => "pgsql:host={$_SERVER['POSTGRES_HOST']};dbname={$_SERVER['POSTGRES_DB']}",
            'username' => $_SERVER['POSTGRES_USER'],
            'password' => $_SERVER['POSTGRES_PASSWORD'],
            'charset' => 'utf8',
        ],
    ],

    'params' => [
        'adminEmail' => 'admin@example.com',
    ],
];
