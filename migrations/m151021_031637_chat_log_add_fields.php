<?php

use yii\db\Schema;
use app\components\Migration;

class m151021_031637_chat_log_add_fields extends Migration
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
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
ALTER TABLE {$this->table}
CHANGE COLUMN from_user_role from_user_cmpy  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '发送者用户所属公司名称' AFTER from_user_nick,
MODIFY COLUMN from_user_dept  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '发送者用户部门名称' AFTER from_user_cmpy,
ADD COLUMN from_user_cmpy_id  bigint NULL DEFAULT NULL COMMENT '发送者公司ID' AFTER from_user_cmpy,
ADD COLUMN from_user_dept_id  bigint NULL DEFAULT NULL COMMENT '发送者部门id' AFTER from_user_dept,
ADD COLUMN from_user_duty  varchar(255) NULL DEFAULT NULL COMMENT '发送者职务名称' AFTER from_user_dept_id,
ADD COLUMN from_user_duty_id  bigint NULL DEFAULT NULL COMMENT '发送者职务id' AFTER from_user_duty;
SQL;
        $this->execute($sql);


    }

    public function down()
    {
        $this->dropColumn($this->table,'from_user_cmpy_id');
        $this->dropColumn($this->table,'from_user_dept_id');
        $this->dropColumn($this->table,'from_user_duty');
        $this->dropColumn($this->table,'from_user_duty_id');
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
