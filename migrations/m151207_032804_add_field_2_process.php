<?php

use yii\db\Schema;
use app\components\Migration;

class m151207_032804_add_field_2_process extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%process}}';

    public $rTable = ['vacate', 'process'];
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $columns = [
        'delivered' => 'ENUM("No", "Yes") DEFAULT "No" COMMENT "是否呈送"',
        'p_keywords' => 'TEXT COMMENT "搜索字段" AFTER p_remark',
        'started_by_name' => 'VARCHAR(100) COMMENT "发起人名称" AFTER p_index'
    ];
    
    public function up()
    {
        foreach ($this->columns as $column => $type) {
            $this->addColumn($this->table, $column, $type);
        }
        foreach ($this->rTable as $t) {
            $this->renameTable("{{%$t}}", "{{%flow_$t}}");
        }
    }

    public function down()
    {
        foreach ($this->columns as $column => $type) {
            $this->dropColumn($this->table, $column);
        }
        foreach ($this->rTable as $t) {
            $this->renameTable("{{%flow_$t}}", "{{%$t}}");
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
