<?php

use yii\db\Schema;
use app\components\Migration;

class m151113_045908_modify_chat_log_add_colunm_sms_send_status extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%chat_log}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'sms_send_status';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint(4) NULL DEFAULT 0 COMMENT '短信发送状态：0=未发送；1=成功；-1=失败'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
        echo "m151113_045908_modify_chat_log_add_colunm_sms_send_status cannot be reverted.\n";
        return false;
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
