<?php

use yii\db\Schema;
use app\components\Migration;

class m151020_071801_user_add_field extends Migration
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
    public $column = 'heartbeat_time';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"int not NULL COMMENT '心跳发送过来的时间，根据时间判断用户是否存活'");
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
