<?php

$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['localhost', '192.168.1.103', '127.0.0.1'],
    'generators' => [
        'module' => [
            'class' => 'app\data\templates\module\Generator',
//            'class' => 'yii\gii\generators\module\Generator',
            'templates' => [
                'restful' => '@app/data/templates/module/restful',
            ],
        ],
    ],
];
