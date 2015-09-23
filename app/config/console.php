<?php
include __DIR__ . '/../components/functions.php';
return [
    'id' => 'yii-console',
    'basePath' => __DIR__ . '/..',
    'controllerNamespace' => 'app\console\controllers',
    'components' => [
        'db' => include __DIR__ . '/db.php',
        'errorHandler' => [
            'class' => 'app\components\ConsoleErrorHandler',
        ],
    ],
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@app/data/templates/migration/create.php',
        ],
    ],
];
