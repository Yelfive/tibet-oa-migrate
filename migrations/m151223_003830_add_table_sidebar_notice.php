<?php

use yii\db\Schema;
use app\components\Migration;

class m151223_003830_add_table_sidebar_notice extends Migration
{
    /**
     * Table name of which to be handled
     * @var string
     */
    public $table = '{{%notify_sidebar}}';

    /**
     * Field names of which to be handled
     * @var array
     */
    public $columns = [
        'msg_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'msg_content' => 'VARCHAR(255) NOT NULL COMMENT "消息类容"',
        'msg_from' => 'INT UNSIGNED NOT NULL COMMENT "发信息的人id"',
        'msg_from_name' => 'VARCHAR(50) NOT NULL COMMENT "发信息的人名称"',
        'msg_to' => 'VARCHAR(2000) NOT NULL COMMENT "接收人id列表"',
        'read_by' => 'VARCHAR(2000) DEFAULT "" COMMENT "已读人id列表"',
        'msg_type' => 'VARCHAR(50) NOT NULL COMMENT "消息类型：Vacate=请假;Reimburse=报销;Car=车辆"',
        'redirect_url' => 'VARCHAR(255) COMMENT "跳转页面"',
        'msg_status' => 'TINYINT DEFAULT 1 COMMENT "1=正常"',
    ];

    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->columns);
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
