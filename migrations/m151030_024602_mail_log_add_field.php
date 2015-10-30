<?php

use yii\db\Schema;
use app\components\Migration;

class m151030_024602_mail_log_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%mail_log}}';
    public $table1 = '{{%sign_log}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->addColumn($this->table,'is_star',"tinyint NULL DEFAULT 0 COMMENT '1=星标邮件，0=非星标邮件'");
        $this->alterColumn($this->table,'is_draft',"tinyint(4) NULL DEFAULT 0 COMMENT '1=草稿，0=非草稿'");
        $this->addColumn($this->table,'to_sex',"tinyint NULL DEFAULT 1 comment '如果给用户发送则有用户性别字段，1=男,2=女'");
        $this->addColumn($this->table,'read_status',"tinyint NULL DEFAULT 0 COMMENT '0=未读，1=已读'");
        $this->addColumn($this->table,'from_user_sex',"tinyint NULL DEFAULT 1 comment '如果给用户发送则有用户性别字段，1=男,2=女'");

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

        $sql1 = <<<SQL
ALTER TABLE {$this->table1}
CHANGE COLUMN id sign_id  int(11) NOT NULL AUTO_INCREMENT COMMENT '签名id' FIRST ,
CHANGE COLUMN type sign_type  tinyint(4) NULL DEFAULT NULL COMMENT '1=个人签名，2=群组公共记录,3=邮件签名' AFTER sign_id,
CHANGE COLUMN conetent content  text CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '签名内容' AFTER sign_type,
MODIFY COLUMN target_id  int(11) NULL DEFAULT NULL COMMENT '签名归属主的编号(用户/用户组)' AFTER content,
ADD COLUMN target_name   varchar(255) NULL COMMENT '签名归属主的名称' AFTER content,
ADD COLUMN enabled  tinyint NULL DEFAULT 1 COMMENT '1=启用，0=禁用' AFTER target_id,
ADD INDEX id_idx (sign_id) ,
ADD INDEX created_by_idx (created_by) ,
ADD INDEX target_id_idx (target_id) ;
SQL;
        $this->execute($sql1);

    }

    public function down()
    {
        $this->dropColumn($this->table,'is_star');
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
