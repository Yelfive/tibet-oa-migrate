<?php

use yii\db\Schema;
use app\components\Migration;

class m151124_040446_add_fild_to_flow extends Migration
{

    public $map = [
        'workflow' => [
            'fields_in_list' => 'TEXT COMMENT "列表中展示字段" AFTER flow_notice',
        ],
        'workflow_nodes' => [
            'approved_rule' => 'TEXT COMMENT "节点通过条件"',
        ]
    ];

    private function _each( $method)
    {
        foreach ($this->map as $table => $fields) {
            foreach ($fields as $field => $type) {
                $this->$method("{{%$table}}", $field, $type);
            }
        }
    }
    
    public function up()
    {
        $this->_each('addColumn');
    }

    public function down()
    {
        $this->_each('dropColumn');
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
