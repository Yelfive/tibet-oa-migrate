<?php

use yii\db\Schema;
use app\components\Migration;

class m151116_070147_modify_table_notify extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%notify}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
ALTER TABLE {$this->table}
MODIFY COLUMN notify_type  tinyint(4) NULL DEFAULT NULL COMMENT '公告通知=1,请假消息=2,任务流消息=3' AFTER notify_id,
MODIFY COLUMN to_name  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '用户或组或部门的名称/所有人' AFTER to_type,
MODIFY COLUMN content  mediumtext CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '通知消息正文内容' AFTER to_name,
CHANGE COLUMN from_user_role from_user_cmpy  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '发送者用户公司名称' AFTER from_user_nick,
CHANGE COLUMN from_user_dept from_user_cmpy_id  int NULL DEFAULT NULL COMMENT '发送者用户的公司编号' AFTER from_user_cmpy,
CHANGE COLUMN if_read is_draft  tinyint(4) NULL DEFAULT NULL COMMENT '是否为草稿，1=草稿，0=非草稿' AFTER send_status,
ADD COLUMN title  varchar(1000) NULL COMMENT '通知标题' AFTER to_name,
ADD COLUMN attachment  varchar(65535) CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '通知附件' AFTER content,
ADD COLUMN from_user_sex  tinyint NULL DEFAULT 1 COMMENT '发送者用户性别，1=男，2=女' AFTER attachment,
ADD COLUMN from_user_dept  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '用户部门名称' AFTER from_user_cmpy_id,
ADD COLUMN from_user_dept_id  int NULL DEFAULT NULL COMMENT '用户部门编号' AFTER from_user_dept,
ADD COLUMN from_user_duty  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '用户行政职务' AFTER from_user_dept_id,
ADD COLUMN from_user_duty_id  int NULL DEFAULT NULL COMMENT '用户行政职务编号' AFTER from_user_duty,
ADD COLUMN top_order  int NULL COMMENT '置顶的顺序，值越大置顶排在越前面' AFTER send_status;
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m151116_070147_modify_table_notify cannot be reverted.\n";

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
