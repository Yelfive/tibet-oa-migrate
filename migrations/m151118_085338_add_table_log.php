<?php

use yii\db\Schema;
use app\components\Migration;

class m151118_085338_add_table_log extends Migration
{
    /**
     * Table name of which to be handled
     * @var string
     */
    public $table = '{{%log}}';

    /**
     * Field name of which to be handled
     * @var string
     */
    public $column = '';

    public function up()
    {
        $sql = "CREATE TABLE $this->table (
            `log_id`  int NOT NULL AUTO_INCREMENT COMMENT '日志编号' ,
            `log_content`  varchar(255) NOT NULL COMMENT '日志内容' ,
            `log_time`  int NOT NULL COMMENT '日志时间' ,
            `log_user_id`  int NULL COMMENT '产生日志的操作人员编号' ,
            `log_user_name`  varchar(255) NULL COMMENT '产生日志的操作人员姓名' ,
            `log_type`  tinyint NULL DEFAULT 0 COMMENT '日志类型：0=自定义；1=SQL日志；2=系统日志；3=操作记录；4=运行信息；5=关键错误' ,
            PRIMARY KEY (`log_id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=0 COMMENT '日志表' DEFAULT CHARSET=utf8
            ";
        $this->execute($sql);
    }

    public function down()
    {
        echo "m151118_085338_add_table_log cannot be reverted.\n";
        $this->dropTable($this->table);
        return false;
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
