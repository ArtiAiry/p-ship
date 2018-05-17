<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
Yii::setAlias('@tests', dirname(__DIR__) . '/tests');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'wmzVUEG7Ncd84R8Vmg5xIGbSvYrsbTis',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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

        'db' => $db,

        'urlManager' => [

            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:index|about|contact|category>' => 'site/<alias>',

                //wallet
                '<module:wallet>/<action:\w+>/<id:\d+>' => '<module>/wallet/<action>',
                '<module:wallet>/<action:\w+>' => '<module>/wallet/<action>',

                //profile
                '<module:profile>/<action:\w+>/<id:\d+>' => '<module>/profile/<action>',
                '<module:profile>/<action:\w+>' => '<module>/profile/<action>',

                //product
                '<module:product>/<action:\w+>/<id:\d+>' => '<module>/product/<action>',
                '<module:product>/<action:\w+>' => '<module>/product/<action>',

            ],
        ],

    ],
    'modules' => [
        'wallet' => [
            'class' => 'app\modules\wallet\Module',
        ],
        'profile' => [
            'class' => 'app\modules\profile\Module',
        ],
        'payout' => [
            'class' => 'app\modules\payout\Module',
        ],
        'product' => [
            'class' => 'app\modules\product\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'fixture' => [
                'class' => 'elisdn\gii\fixture\Generator',
            ],
        ],
    ];
}

return $config;
