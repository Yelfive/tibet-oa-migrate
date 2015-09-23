<?php

include __DIR__ . '/../components/functions.php';

$config = [
    'id' => 'RESTful-API',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\controllers',
    'language' => 'zh-CN',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'abc',
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
            'class' => 'app\components\ErrorHandler',
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],
        'db' => include __DIR__ . '/db.php',
    ],
    'modules' => getExtendModules(),
    'params' => include __DIR__ . '/params.php',
];
// Load extended modules
include __DIR__ . '/modules.php';

// Return config
return $config;
