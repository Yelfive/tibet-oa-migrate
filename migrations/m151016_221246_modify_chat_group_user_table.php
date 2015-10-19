<?php

use yii\db\Schema;
use app\components\Migration;

class m151016_221246_modify_chat_group_user_table extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%chat_group_user}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
ALTER TABLE {$this->table}
MODIFY COLUMN group_name  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '聊天组名称' AFTER group_id,
CHANGE COLUMN user_id group_member_id  bigint(11) NOT NULL COMMENT '组成员的ID' AFTER group_name,
CHANGE COLUMN user_fullname group_member_type  tinyint NOT NULL COMMENT '成员类型，1=all,2=user,3=company,4=department,5=duty' AFTER group_member_id,
ADD COLUMN group_member_name  varchar(255) NULL AFTER group_member_id,
DROP INDEX FK_chat_group_user2 ,
ADD INDEX FK_chat_group_user2 (group_member_id) USING BTREE ;
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m151016_221246_modify_chat_group_user_table cannot be reverted.\n";

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
