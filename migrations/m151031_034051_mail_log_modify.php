<?php

use yii\db\Schema;
use app\components\Migration;

class m151031_034051_mail_log_modify extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $mail_table = '{{%mail}}';
    public $send_mail_table = '{{%send_mail_log}}';
    public $mail_state_table = '{{%mail_state}}';
    public $mail_in_folder = '{{%mail_in_folder}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql_mail = <<<SQL
DROP TABLE IF EXISTS {$this->mail_table};
CREATE TABLE {$this->mail_table} (
  mail_id bigint(20) NOT NULL AUTO_INCREMENT COMMENT '发送邮件编号',
  subject varchar(3000) COLLATE utf8_bin DEFAULT NULL COMMENT '邮件主题内容',
  attachment varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '邮件附件文件[{file_secret:xxx,url:xxx,file_name:xxxx,ext:xxxx},{file_secret:xxx,url:xxx,file_name:xxxx,ext:xxxx}]',
  content mediumtext COLLATE utf8_bin COMMENT '邮件正文内容',
  from_user_email varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者邮箱地址',
  from_fullname varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者名称',
  from_user_sex tinyint(4) DEFAULT '1' COMMENT '如果给用户发送则有用户性别字段，1=男,2=女',
  from_user_nick varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者用户昵称',
  is_draft tinyint(4) DEFAULT 0 COMMENT '1=草稿，0=非草稿',
  send_status tinyint(4) DEFAULT 0 COMMENT '发送状态1=已发送，0=未发送，2=发送失败',
  created_at int(11) DEFAULT NULL COMMENT '创建时间',
  updated_at int(11) DEFAULT NULL COMMENT '更新时间',
  created_by bigint(20) DEFAULT NULL COMMENT '创建人',
  updated_by bigint(20) DEFAULT NULL COMMENT '更新人',
  deleted tinyint(4) DEFAULT '0' COMMENT '软删除 1=已删除，0=未删除',
  PRIMARY KEY (mail_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='邮件实体表';
SQL;



       /* const SEND_TO_TYPE_USER = 1;
        const SEND_TO_TYPE_GROUP = 2;
        const SEND_TO_TYPE_DEPARTMENT = 3;
        const SEND_TO_TYPE_COMPANY = 4;
        const SEND_TO_TYPE_DUTY = 5;*/
        $sql_send_mail = <<<SQL
DROP TABLE IF EXISTS {$this->send_mail_table};
CREATE TABLE {$this->send_mail_table} (
  id bigint(20) NOT NULL AUTO_INCREMENT COMMENT '表主键ID',
  mail_id bigint(20) NOT NULL COMMENT '邮件编号',
  mail_subject varchar(3000) COLLATE utf8_bin DEFAULT NULL COMMENT '邮件主题内容',
  send_type tinyint(4) DEFAULT NULL COMMENT '邮件发送类型，1=发送，2=抄送,3=密送',
  to_type tinyint(4) DEFAULT NULL COMMENT '接收者类型，1=user，2=group,3=department,4=company,5=duty,6=all',
  to_id bigint(20) DEFAULT NULL COMMENT '用户或组或部门的ID',
  to_name varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '用户或组或部门的名称',
  to_sex tinyint(4) DEFAULT '1' COMMENT '如果给用户发送则有用户性别字段，1=男,2=女',
  to_user_email tinyint(4) DEFAULT '1' COMMENT '如果给用户发送则记录用户的邮箱名称',
  from_user_email varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者邮箱地址',
  from_fullname varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者名称',
  from_user_sex tinyint(4) DEFAULT '1' COMMENT '如果给用户发送则有用户性别字段，1=男,2=女',
  from_user_nick varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者用户昵称',
  from_user_cmpy varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者用户所属公司名称',
  from_user_cmpy_id bigint(20) DEFAULT NULL COMMENT '发送者公司ID',
  from_user_dept varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者用户部门名称',
  from_user_dept_id bigint(20) DEFAULT NULL COMMENT '发送者部门id',
  from_user_duty varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '发送者职务名称',
  from_user_duty_id bigint(20) DEFAULT NULL COMMENT '发送者职务id',
  created_at int(11) DEFAULT NULL COMMENT '创建时间',
  updated_at int(11) DEFAULT NULL COMMENT '更新时间',
  created_by bigint(20) DEFAULT NULL COMMENT '创建人',
  updated_by bigint(20) DEFAULT NULL COMMENT '更新人',
  deleted tinyint(4) DEFAULT '0' COMMENT '软删除 1=已删除，0=未删除',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='发送邮件记录';
SQL;

        $sql_mail_state = <<<SQL
DROP TABLE IF EXISTS {$this->mail_state_table};
CREATE TABLE {$this->mail_state_table} (
  id bigint(20) NOT NULL AUTO_INCREMENT COMMENT '表主键ID',
  mail_id bigint(20) NOT NULL COMMENT '邮件编号',
  type tinyint(4) DEFAULT 1 COMMENT '为用户星标或用户是否已读，1=星标邮件，2=邮件阅读',
  created_at int(11) DEFAULT NULL COMMENT '创建时间',
  updated_at int(11) DEFAULT NULL COMMENT '更新时间',
  created_by bigint(20) DEFAULT NULL COMMENT '创建人',
  updated_by bigint(20) DEFAULT NULL COMMENT '更新人',
  deleted tinyint(4) DEFAULT '0' COMMENT '软删除 1=已删除，0=未删除',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='星标邮件记录';
SQL;


        $sql_mail_in_folder = <<<SQL
DROP TABLE IF EXISTS {$this->mail_in_folder};
CREATE TABLE {$this->mail_in_folder} (
  id bigint(20) NOT NULL AUTO_INCREMENT COMMENT '表主键ID',
  mail_id bigint(20) NOT NULL COMMENT '邮件编号',
  folder_id bigint(20) NOT NULL COMMENT '文件夹编号',
  created_at int(11) DEFAULT NULL COMMENT '创建时间',
  updated_at int(11) DEFAULT NULL COMMENT '更新时间',
  created_by bigint(20) DEFAULT NULL COMMENT '创建人',
  updated_by bigint(20) DEFAULT NULL COMMENT '更新人',
  deleted tinyint(4) DEFAULT '0' COMMENT '软删除 1=已删除，0=未删除',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='在文件夹中的邮件关联表';
SQL;

        $this->execute($sql_send_mail);
        $this->execute($sql_mail);
        $this->execute($sql_mail_in_folder);
        $this->execute($sql_mail_state);


    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS {$this->mail_in_folder};";
        $sql1 = "DROP TABLE IF EXISTS {$this->mail_state_table};";
        $sql2 = "DROP TABLE IF EXISTS {$this->send_mail_table};";
        $sql3 = "DROP TABLE IF EXISTS {$this->mail_table};";
        $this->execute($sql);
        $this->execute($sql1);
        $this->execute($sql2);
        $this->execute($sql3);

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
