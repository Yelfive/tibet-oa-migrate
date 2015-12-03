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

    /**
     * Create table with base fields
     * @param string $table
     * @param array $columns
     * @param null $options
     */
    public function createTableWithBaseFields($table, $columns, $options = null)
    {
        $baseFields = [
            'created_by' => 'INT COMMENT "创建人"',
            'updated_by' => 'INT COMMENT "更新人"',
            'created_at' => 'INT COMMENT "创建时间"',
            'updated_at' => 'INT COMMENT "更新人"',
            'deleted' => 'TINYINT DEFAULT 0 COMMENT "是否删除"',
        ];
        $columns = array_merge($columns, array_diff($baseFields, $columns)); // Make sure the base fields comes at last
        parent::createTable($table, $columns, $options);
    }
}