<?php

namespace app\controllers;

class UserController extends \app\components\SController {

    public function actionList() {
        return json_encode([
            ['id' => '1', 'name' => '张三',],
            ['id' => '2', 'name' => '李四',],
        ]);
    }

    public function actionIndex() {
        
    }

}
