<?php

use yii\db\Schema;
use app\components\Migration;

class m151116_083821_modify_table_notify2 extends Migration
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
MODIFY COLUMN to_id  bigint(20) NULL DEFAULT 0 COMMENT '接收者的编号，值为0表示发送给所有人' AFTER notify_type,
MODIFY COLUMN to_type  tinyint(4) NULL DEFAULT 6 COMMENT '接收者类型，1=user，2=group,3=department,4=company,5=duty,6=all' AFTER to_id,
MODIFY COLUMN top_order  int(11) NULL DEFAULT 0 COMMENT '置顶的顺序，值越大置顶排在越前面' AFTER send_status,
MODIFY COLUMN to_name  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '所有人' COMMENT '用户或组或部门的名称/所有人' AFTER to_type,
ADD COLUMN open_level  tinyint NULL DEFAULT 1 COMMENT '公开级别，1=全公开，2=半公开' AFTER top_order;
SQL;
        $this->execute($sql);


    }

    public function down()
    {

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
