<?php

use yii\db\Schema;
use app\components\Migration;

class m151030_033901_create_mail_folder extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%folder}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE {$this->table} (
folder_id  bigint NULL AUTO_INCREMENT ,
folder_name  varchar(255) NULL comment '文件夹名称',
folder_desc  varchar(255) NULL comment '文件夹介绍',
name_letter_short    varchar(255) comment '名称拼音首字母',
name_letter_long     varchar(255) comment '名称拼音全字母',
folder_type          tinyint default 0 COMMENT '1=email' ,
`left`                 int comment '左值，用于左右值排序',
`right`                int comment '右值，用于左右值排序',
`level`                int comment '层级，用于左右值排序',
created_at           int comment '创建时间',
updated_at           int comment '更新时间',
created_by           bigint comment '创建人',
updated_by           bigint comment '更新人',
deleted              tinyint default 0 comment '软删除 1=已删除，0=未删除',
INDEX folder_id_idx (folder_id),
INDEX created_by_idx (created_by),
PRIMARY KEY (folder_id)
)
ENGINE = MYISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
;
SQL;
        $this->execute($sql);


    }

    public function down()
    {
        $this->dropTable($this->table);
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
