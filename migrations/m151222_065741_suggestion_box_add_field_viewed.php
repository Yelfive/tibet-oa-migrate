<?php

use yii\db\Schema;
use app\components\Migration;

class m151222_065741_suggestion_box_add_field_viewed extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%suggestion_box}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'viewed';
    public $column1 = 'to_id';
    public $column2 = 'to_name';

    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint not null default 0 COMMENT '是否已经查看过'");
        $this->addColumn($this->table,$this->column1,"int not null default 0 COMMENT '发送的人的ID'");
        $this->addColumn($this->table,$this->column2,"varchar(255) not null default '' COMMENT '发送的人的名称'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
        $this->dropColumn($this->table,$this->column1);
        $this->dropColumn($this->table,$this->column2);
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
