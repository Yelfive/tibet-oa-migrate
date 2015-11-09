<?php

use yii\db\Schema;
use app\components\Migration;

class m151031_030403_mail_log_field_order_move extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%mail_log}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
ALTER TABLE {$this->table}
MODIFY COLUMN to_sex  tinyint(4) NULL DEFAULT 1 COMMENT '如果给用户发送则有用户性别字段，1=男,2=女' AFTER to_name,
MODIFY COLUMN from_user_sex  tinyint(4) NULL DEFAULT 1 COMMENT '如果给用户发送则有用户性别字段，1=男,2=女' AFTER from_fullname,
MODIFY COLUMN is_star  tinyint(4) NULL DEFAULT 0 COMMENT '1=星标邮件，0=非星标邮件' AFTER is_draft,
MODIFY COLUMN read_status  tinyint(4) NULL DEFAULT 0 COMMENT '0=未读，1=已读' AFTER send_status;
SQL;

        $this->execute($sql);
    }

    public function down()
    {
        echo "m151031_030403_mail_log_field_order_move cannot be reverted.\n";

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
