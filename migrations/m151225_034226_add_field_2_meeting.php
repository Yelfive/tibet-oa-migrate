<?php

use yii\db\Schema;
use app\components\Migration;

class m151225_034226_add_field_2_meeting extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%flow_meeting}}';
    
    /**
     * Field names of which to be handled
     * @var array
     */
    public $columns = [
        'host_id' => 'INT UNSIGNED NOT NULL COMMENT "主办单位id"',
        'host_name' => 'VARCHAR(255) NOT NULL COMMENT "主办单位名称"',
    ];
    
    public function up()
    {
        foreach ($this->columns as $field => $definition) {
            $this->addColumn($this->table, $field, $definition);
        }
    }

    public function down()
    {
        foreach ($this->columns as $field => $definition) {
            $this->dropColumn($this->table, $field);
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
