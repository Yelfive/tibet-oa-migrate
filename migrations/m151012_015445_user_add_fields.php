<?php

use yii\db\Schema;
use app\components\Migration;

class m151012_015445_user_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%user}}';
    public $table1 = '{{%operation_log}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $this->addColumn($this->table,'login_time',"int default 0 COMMENT '登录时间'");
        $this->addColumn($this->table,'login_count',"int default 0 COMMENT '登录次数'");
        $this->addColumn($this->table,'login_ip',"varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT '登录ip'");
        $this->addColumn($this->table,'login_error_count',"int default 0 COMMENT '登录错误次数'");
        $this->addColumn($this->table,'user_type',"smallint default 0 COMMENT '用户类型,1=管理员,2=普通用户'");


        $sql = <<<SQL
create table {$this->table1}
(
   log_id            bigint not null auto_increment,
   content           varchar(255) NOT NULL COMMENT '操作内容',
   username          varchar(255) NOT NULL COMMENT '操作账号',
   fullname          varchar(255) NOT NULL COMMENT '操作者全名',
   ip                varchar(128) NOT NULL COMMENT '访问ip',
   url               varchar(1000) NOT NULL COMMENT '访问地址',
   created_at        int NOT NULL comment '创建时间',
   updated_at           int comment '更新时间',
   created_by           bigint NOT NULL comment '创建人',
   updated_by           bigint comment '更新人',
   deleted              tinyint default 1 comment '软删除 0=已删除，1=未删除',
   primary key (log_id) ,
   INDEX log_id_idx (log_id) ,
   INDEX created_by_idx (created_by)
)ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin COMMENT='用户操作日志表' AUTO_INCREMENT=1;
SQL;

        $this->execute($sql);

    }

    public function down()
    {
        $this->dropColumn($this->table,'login_time');
        $this->dropColumn($this->table,'login_count');
        $this->dropColumn($this->table,'login_ip');
        $this->dropColumn($this->table,'login_error_count');
        $this->dropColumn($this->table,'user_type');

        $this->dropTable($this->table1);
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
