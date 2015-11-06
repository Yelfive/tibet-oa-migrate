<?php

use yii\db\Schema;
use app\components\Migration;

class m151106_025755_mail_log_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%mail}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'is_forward_mail';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint NULL DEFAULT 0 COMMENT '是否为转发邮件,1=是，0=否'");
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
