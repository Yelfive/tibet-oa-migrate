<?php

namespace app\modules\erp2\controllers;

use app\components\MController as Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return response('This is a default action from a default controller : DefaultController::actionIndex' , 200);
    }
}
