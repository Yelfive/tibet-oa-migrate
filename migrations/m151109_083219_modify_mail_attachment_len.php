<?php

use yii\db\Schema;
use app\components\Migration;

class m151109_083219_modify_mail_attachment_len extends Migration
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
    public $column = 'attachment';
    
    public function up()
    {

        $this->alterColumn($this->table,$this->column,"varchar(65535) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '邮件附件文件[{file_secret:xxx,url:xxx,file_name:xxxx,ext:xxxx},{file_secret:xxx,url:xxx,file_name:xxxx,ext:xxxx}]'");

    }

    public function down()
    {
        echo "m151109_083219_modify_mail_attachment_len cannot be reverted.\n";

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
