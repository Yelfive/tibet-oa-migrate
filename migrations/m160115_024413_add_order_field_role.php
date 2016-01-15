<?php

use yii\db\Schema;
use app\components\Migration;

class m160115_024413_add_order_field_role extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%role}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'order_by';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"int NULL DEFAULT 0 COMMENT '排序值，默认根据工号同步'");
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
