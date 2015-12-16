<?php

use yii\db\Schema;
use app\components\Migration;

class m151216_022517_notify_add_field_read_user_ids extends Migration
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
    public $column = 'read_user_ids';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"text not null default '' comment '存储已经阅读过该通知的用户id' ");
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
