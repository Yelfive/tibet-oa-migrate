<?php

use yii\db\Schema;
use app\components\Migration;

class m151006_120343_modify_user_table extends Migration
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
    public $column = '';
    
    public function up()
    {

        $sql=<<<SQL
ALTER TABLE {$this->table}
MODIFY COLUMN user_name  varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '人员姓名' AFTER user_id,
MODIFY COLUMN user_pwd  varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '人员账号登陆密码MD5(name+pwd)' AFTER user_name,
CHANGE COLUMN user_avatarr user_avatar  varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '人员头像URL' AFTER user_letter,
ADD COLUMN user_account  varchar(255) NOT NULL AFTER user_id;
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m151006_120343_modify cannot be reverted.\n";

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
