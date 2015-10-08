<?php

use yii\db\Schema;
use app\components\Migration;

class m151008_141430_add_table_menu extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%menu}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
$sql = <<<SQL
CREATE TABLE {$this->table} (
menu_id  integer NOT NULL AUTO_INCREMENT COMMENT '菜单id' ,
menu_label  varchar(255) NULL COMMENT '菜单标签' ,
menu_url  varchar(255) NULL COMMENT '菜单地址' ,
parent_id  integer NULL COMMENT '父级菜单id' ,
menu_module  varchar(255) NULL COMMENT '菜单所属模块' ,
enabled  tinyint NULL DEFAULT 1 COMMENT '是否启用' ,
created_at  int NULL COMMENT '创建时间' ,
updated_at  int NULL COMMENT '更新时间' ,
updated_by  int NULL COMMENT '更新人' ,
created_by  int NULL COMMENT '创建人' ,
PRIMARY KEY (menu_id),
INDEX menu_id_idx (menu_id) ,
INDEX parent_id_idx (parent_id)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin
COMMENT='菜单表'
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
