<?php

use yii\db\Schema;
use app\components\Migration;

class m151118_022648_create_table_notify_config extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%notify_config}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE {$this->table} (
config_id  integer NOT NULL AUTO_INCREMENT ,
config_type  tinyint NOT NULL DEFAULT 1 COMMENT '1=可以发通知的人，2=可以看半公开通知的人' ,
user_id  integer NOT NULL COMMENT '配置对应的用户ID' ,
user_fullname  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '用户全名' ,
created_at  integer NULL COMMENT '创建时间' ,
updated_at  integer NULL COMMENT '更新时间' ,
created_by  integer NULL COMMENT '创建人' ,
updated_by  integer NULL COMMENT '更新人' ,
deleted  tinyint NULL DEFAULT 0 COMMENT '软删除，1=已删除，0=未删除' ,
PRIMARY KEY (config_id),
INDEX user_id_idx (user_id) ,
INDEX config_id_idx (config_id)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin
COMMENT='配置可以发送通知的人和可以看半公开通知的人'
CHECKSUM=0
DELAY_KEY_WRITE=0
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
