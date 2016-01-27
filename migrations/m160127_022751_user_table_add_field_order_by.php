<?php

use yii\db\Schema;
use app\components\Migration;

class m160127_022751_user_table_add_field_order_by extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%user}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'order_by';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"int not null default 0 comment '排序字段'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
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
