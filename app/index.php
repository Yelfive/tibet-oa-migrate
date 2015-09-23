<?php

define('__APP__', __DIR__);
 define('YII_DEBUG', true);
include __DIR__ . '/config/includes.php';
$config = include __DIR__ . '/config/main.php';

(new \yii\web\Application($config))->run();
