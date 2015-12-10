<?php

use yii\db\Schema;
use app\components\Migration;

class m151210_071543_create_table_suggestion_box extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%suggestion_box}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
CREATE TABLE {$this->table} (
id  int NOT NULL AUTO_INCREMENT ,
content  text NOT NULL COMMENT '建议意见/监察举报内容' ,
type  tinyint NOT NULL DEFAULT 1 COMMENT '1=意见建议，2=监察举报' ,
is_public  tinyint NOT NULL DEFAULT 1 COMMENT '1=公开，0=匿名' ,
from_fullname  varchar(255) NOT NULL COMMENT '创建者姓名' ,
created_by  int NOT NULL DEFAULT 0 ,
updated_by  int NOT NULL DEFAULT 0 ,
created_at  int NOT NULL DEFAULT 0 ,
updated_at  int NOT NULL DEFAULT 0 ,
deleted  tinyint NOT NULL DEFAULT 0 ,
PRIMARY KEY (id),
INDEX idx_created_by (created_by) USING BTREE
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='意见信箱表'
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
