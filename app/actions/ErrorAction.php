<?php

namespace app\actions;

class ErrorAction extends \yii\base\Action {

    public function run($code = 0) {
        /* @var $exception \yii\web\NotFoundHttpException */
        $exception = \Yii::$app->errorHandler->exception;

        if ($exception) {
            $msg = $exception->getMessage();
            $code = 600 + $exception->getCode();
            return response($msg, $code);
        } else {
            $msg = $this->_getCodeDescription($code);
            return response($msg, $code);
        }
    }

    private function _getCodeDescription($code) {
        $map = [
            404 => \Yii::t('errors', 'Action not found'),
            500 => \Yii::t('errors', 'Internal Server Error'),
        ];
        return $map[$code];
    }

}
