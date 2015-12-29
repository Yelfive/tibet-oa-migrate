<?php

use yii\db\Schema;
use app\components\Migration;

class m151228_035318_add_field_4_statics_2_flow extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%table}}';
    
    /**
     * Field names of which to be handled
     * @var array
     */
    public $columns = [
        'creator_role_ids' => 'VARCHAR(50) COMMENT "申请人角色id"',
        'creator_role_names' => 'VARCHAR(255) COMMENT "申请人角色名称"',
        'leader_of' => 'VARCHAR(100) COMMENT "领导下属单位名称，comma 隔开，null=不是领导"',
    ];
    
    public function up()
    {
        foreach ($this->columns as $field => $type) {
            $this->addColumn('{{%flow_reimburse}}', $field, $type);
            $this->addColumn('{{%flow_vacate}}', $field, $type);
        }
    }

    public function down()
    {
        foreach ($this->columns as $field => $type) {
            $this->dropColumn('{{%flow_reimburse}}', $field);
            $this->dropColumn('{{%flow_vacate}}', $field);
        }
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
