<?php

use yii\db\Schema;
use app\components\Migration;

class m160115_085432_work_schedule_user_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%work_schedule_user}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'send_wxqy_msg';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint not null default 0 COMMENT '微信企业信息发送状态1=已发送，0=未发送'");
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
