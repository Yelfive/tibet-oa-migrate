<?php

namespace app\controllers;

class SiteController extends \app\components\SController {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@app/errors/error.php'
            ]
        ];
    }

    public function actionIndex() {
//        $a = $b;
//        $a = $b;
//        return \Yii::t('errors', 'Action not found');
        return json_encode([
            ['id' => '11', 'name' => '张三',],
            ['id' => '2', 'name' => '李四',],
        ]);
    }

    public function actionError() {
        
    }

}
