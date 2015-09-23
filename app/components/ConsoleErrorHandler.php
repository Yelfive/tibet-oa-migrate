<?php

namespace app\components;

use yii\helpers\Console;

class ConsoleErrorHandler extends \yii\console\ErrorHandler
{
    
    public function renderException($exception) {
        if ($exception instanceof Exception && ($exception instanceof UserException || !YII_DEBUG)) {
            $message = $this->formatMessage($exception->getName() . ': ') . $exception->getMessage();
        } elseif (YII_DEBUG) {
            if ($exception instanceof Exception) {
                $message = $this->formatMessage("Exception ({$exception->getName()})");
            } elseif ($exception instanceof ErrorException) {
                $message = $this->formatMessage($exception->getName());
            } else {
                $message = $this->formatMessage('Exception');
            }
            $message .= $this->formatMessage(" '" . get_class($exception) . "'", [Console::BOLD, Console::FG_BLUE])
                . " with message " . $this->formatMessage("'{$exception->getMessage()}'", [Console::BOLD]) //. "\n"
                . "\n\nin " . dirname($exception->getFile()) . DIRECTORY_SEPARATOR . $this->formatMessage(basename($exception->getFile()), [Console::BOLD])
                . ':' . $this->formatMessage($exception->getLine(), [Console::BOLD, Console::FG_YELLOW]) . "\n";
            if ($exception instanceof \yii\db\Exception && !empty($exception->errorInfo)) {
                $message .= "\n" . $this->formatMessage("Error Info:\n", [Console::BOLD]) . print_r($exception->errorInfo, true);
            }
            $message .= "\n" . $this->formatMessage("Stack trace:\n", [Console::BOLD]) . $exception->getTraceAsString();
        } else {
            $message = $this->formatMessage('Error: ') . $exception->getMessage();
        }

        if (isset($_SERVER['OS']) && false !== strpos(strtolower($_SERVER['OS']), 'windows') && strtolower(\Yii::$app->db->charset) == 'utf8') {
            $message = iconv('UTF-8', 'GBK', $message);
        }
        if (PHP_SAPI === 'cli') {
            Console::stderr($message . "\n");
        } else {
            echo $message . "\n";
        }
    }
}