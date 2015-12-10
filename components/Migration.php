<?php
/**
 * Class not used due to ,actions not based on method exectue of it's parent but the \yii\db\Connection
 */

namespace app\components;

class Migration extends \yii\db\Migration
{

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

    public function createTablesWithBaseFields($tables)
    {
        foreach ($tables as $table => $info) {
            $this->createTableWithBaseFields($table, $info[0], $info[1]);
        }
    }

    public function dropTables($tables)
    {
        array_walk($tables, function($v, $k) {
            $this->dropTable($k);
        });
    }
}