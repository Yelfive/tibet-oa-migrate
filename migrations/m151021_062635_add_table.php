<?php

use yii\db\Schema;
use app\components\Migration;

class m151021_062635_add_table extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%get_message_log}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql=<<<SQL
CREATE TABLE {$this->table} (
id  bigint NOT NULL AUTO_INCREMENT COMMENT '表id' ,
last_get_msg_time  bigint NULL COMMENT '轮询和对方的聊天记录的上一次轮询时间' ,
to_type  tinyint NULL COMMENT '聊天对方类型，1=user，2=group，3=department，4=company,5=duty' ,
to_id  bigint NULL COMMENT '聊天对方的ID（组/用户的ID）' ,
created_by  bigint NULL COMMENT '当前用户的id',
created_at  bigint NULL ,
updated_by  bigint NULL ,
updated_at  bigint NULL ,
deleted  tinyint NULL COMMENT '软删除，1=已删除，0=未删除' ,
PRIMARY KEY (id),
INDEX search_idx (to_type, to_id, created_by)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin
COMMENT='用户轮询数据表，查找和当前聊天对象的聊天记录，每查一次记录一个偏移量时间，方便后续根据偏移量查找'
AUTO_INCREMENT=1
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
