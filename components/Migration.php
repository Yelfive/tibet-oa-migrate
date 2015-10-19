<?php
/**
 * Class not used due to ,actions not based on method exectue of it's parent but the \yii\db\Connection
 */

namespace app\components;

class Migration extends \yii\db\Migration
{
    /**
     * Executes a SQL statement.
     * This method executes the specified SQL statement using [[db]].
     * @param string $sql the SQL statement to be executed
     * @param array $params input parameters (name => value) for the SQL execution.
     * See [[Command::execute()]] for more details.
     */
    // public function execute($sql, $params = [])
    // {
    //     /* @var $db \yii\db\Connection */
    //     $db = \Yii::$app->db;
    //     if (false !== strpos(strtolower($_SERVER['OS']), 'windows') && strtolower($db->charset) !== 'gbk') {
    //         $sql = iconv($db->charset, 'GBK', $sql);
    //     }
    //     return parent::execute($sql, $params);
    // }
}