<?php

use yii\db\Schema;
use app\components\Migration;

class m151206_143316_add_fields_to_process extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%process}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'p_remark';
    
    public function up()
    {
        $this->addColumn($this->table, $this->column, 'VARCHAR(2550) DEFAULT "" COMMENT "审批备注" AFTER p_status');
    }

    public function down()
    {
        $this->dropColumn($this->table, $this->column);
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
