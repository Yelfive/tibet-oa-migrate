<?php

use yii\db\Schema;
use app\components\Migration;

class m160107_083333_notify_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%notify}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'sender';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"varchar(300) not null default '' comment '自定义发送人'");
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
