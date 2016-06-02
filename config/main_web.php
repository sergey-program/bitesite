<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'db' => require(__DIR__ . '/_db.php'),
        'request' => ['cookieValidationKey' => '6rPtT4qW2bCHD_atlly6BYCxfqfmdY3h'],
        'cache' => ['class' => 'yii\caching\FileCache'],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            'useFileTransport' => true
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning']
                ]
            ],
        ],

//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'rules' => []
//        ]
    ],
    'params' => require(__DIR__ . '/_params.php')
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
