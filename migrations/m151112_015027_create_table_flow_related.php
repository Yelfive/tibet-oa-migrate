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
                'flow_name' => 'VARCHAR(255) NOT NULL COMMENT "��������"',
                'flow_notice' => 'VARCHAR(255) COMMENT "��������"'
            ],
            'ENGINE=InnoDb CHARSET=UTF8 COMMENT="����"',
        ],
        '{{%workflow_nodes}}' => [
            [
                'node_id' => 'pk',
                'flow_id' => 'INT UNSIGNED NOT NULL COMMENT "����{{%flow}}.flow_id"',
                'node_index' => 'INT UNSIGNED COMMENT "�ڵ�����"',
                'node_parent' => 'INT UNSIGNED COMMENT "����node id"',
                'node_name' => 'VARCHAR(255) COMMENT "�ڵ�����"',
                'node_privilege' => 'TEXT COMMENT "��Ȩ���ʸýڵ���б�"',
                'node_access_read' => 'TEXT COMMENT "��Ȩ�����ֶ�"',
                'node_access_write' => 'TEXT COMMENT "��Ȩд���ֶΣ� U(д)��U(��)"',
            ],
            'ENGINE=InnoDb CHARSET=UTF8 COMMENT="���̽ڵ�"',
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
