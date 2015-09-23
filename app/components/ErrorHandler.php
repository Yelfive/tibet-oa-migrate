<?php

namespace app\components;

class ErrorHandler extends \yii\web\ErrorHandler {

    /**
     * Renders the exception.
     * @param \Exception $exception
     */
    public function renderException($exception) {
//        ini_set('display_errors', 'on');
//        error_reporting(1);
        // isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

        /* @var $response \yii\web\Response */
        $response = \Yii::$app->response;
        $isAjax = \Yii::$app->request->isAjax;
//        $isAjax = true;
        if ($isAjax) {
            $response->format = $response::FORMAT_JSON;
            $data = $this->convertExceptionToArray($exception);
            if (defined('YII_DEBUG') && YII_DEBUG) {
                $data['code'] = 500;
            } else if (isset($data['status'])) {
                $data['code'] = $data['status'];
                unset($data['status']);
            }
            $response->data = $data;
            $response->setStatusCode(200);
            $response->send();
        } else {
            parent::renderException($exception);
        }
    }

}
