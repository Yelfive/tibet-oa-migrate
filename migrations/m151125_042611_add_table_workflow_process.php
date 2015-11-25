<?php

use yii\db\Schema;
use app\components\Migration;

class m151125_042611_add_table_workflow_process extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%workflow_process}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE {$this->table} (
process_id  int NOT NULL AUTO_INCREMENT ,
node_id  int NULL COMMENT '流程节点ID' ,
approver_fullname  varchar(255) NULL COMMENT '审批人姓名' ,
status  tinyint NULL COMMENT '审批结果，1=通过，0=不通过' ,
comment  text NULL COMMENT '审批意见内容' ,
created_at  int NULL ,
updated_at  int NULL ,
created_by  int NULL COMMENT '创建人' ,
updated_by  int NULL COMMENT '更新人' ,
deleted  tinyint NULL COMMENT '软删除，1=已删除，0=未删除' ,
PRIMARY KEY (process_id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin
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
