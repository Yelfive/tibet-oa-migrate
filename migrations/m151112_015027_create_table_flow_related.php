<?php

use yii\db\Schema;
use app\components\Migration;

class m151112_015027_create_table_flow_related extends Migration
{
    /**
     * Table name of which to be handled
     * @var array
     */
    public $tables = [
        '{{%workflow}}' => [
            [
                'flow_id' => 'pk',
                'sf_id' => 'INT UNSIGNED COMMENT "super form id"',
                'flow_name' => 'VARCHAR(255) NOT NULL COMMENT "流程名称"',
                'flow_notice' => 'VARCHAR(255) COMMENT "提醒设置"'
            ],
            'ENGINE=InnoDb CHARSET=UTF8 COMMENT="流程"',
        ],
        '{{%workflow_nodes}}' => [
            [
                'node_id' => 'pk',
                'flow_id' => 'INT UNSIGNED NOT NULL COMMENT "关联{{%flow}}.flow_id"',
                'node_index' => 'INT UNSIGNED COMMENT "节点索引"',
                'node_parent' => 'INT UNSIGNED COMMENT "父级node id"',
                'node_name' => 'VARCHAR(255) COMMENT "节点名称"',
                'node_privilege' => 'TEXT COMMENT "有权访问该节点的列表"',
                'node_access_read' => 'TEXT COMMENT "有权读的字段"',
                'node_access_write' => 'TEXT COMMENT "有权写的字段， U(写)∈U(读)"',
            ],
            'ENGINE=InnoDb CHARSET=UTF8 COMMENT="流程节点"',
        ],
    ];

    public function up()
    {
        $this->dropTable('{{%workflow_node}}');
        $this->dropTable('{{%workflow_executor}}');
        $this->dropTable('{{%workflow_process}}');
        foreach ($this->tables as $table => &$info) {
            $this->createTableWithBaseFields($table, $info[0], $info[1]);
        }
    }

    public function down()
    {
        foreach ($this->tables as $table => $info) {
            $this->dropTable($table);
        }
        $this->createTable('{{%workflow_node}}', ['id' => 'pk']);
        $this->createTable('{{%workflow_executor}}', ['id' => 'pk']);
        $this->createTable('{{%workflow_process}}', ['id' => 'pk']);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
