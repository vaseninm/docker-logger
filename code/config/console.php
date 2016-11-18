<?php

$common = require(__DIR__ . '/common.php');

$config = [
    'controllerNamespace' => 'app\commands',
    'components' => [
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return \yii\helpers\ArrayHelper::merge($common, $config);
