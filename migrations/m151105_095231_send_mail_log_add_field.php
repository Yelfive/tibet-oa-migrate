<?php

use yii\db\Schema;
use app\components\Migration;

class m151105_095231_send_mail_log_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%send_mail_log}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
ALTER TABLE {$this->table}
MODIFY COLUMN to_user_email  varchar(255) NULL DEFAULT '' COMMENT '如果给用户发送则记录用户的邮箱名称' AFTER to_sex;
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m151105_095231_send_mail_log_add_field cannot be reverted.\n";

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
