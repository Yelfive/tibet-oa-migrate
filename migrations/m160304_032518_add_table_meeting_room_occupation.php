<?php

use yii\db\Schema;
use app\components\Migration;

class m160304_032518_add_table_meeting_room_occupation extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%meeting_room_occupation}}';
    
    /**
     * Field names of which to be handled
     * @var array
     */
    public $columns = [
        'occupy_id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
        'room_id' => 'INT UNSIGNED NOT NULL COMMENT "会议室ID"',
        'meeting_id' => 'VARCHAR(1000) COMMENT "会议ID"',
        'meeting_topic' => 'VARCHAR(1000) COMMENT "会议名称"',
        'start_at' => 'INT COMMENT "会议开始时间"',
        'end_at' => 'INT COMMENT "会议结束时间"',
    ];
    
    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->columns, 'ENGINE=INNODB CHARSET=UTF8 COMMENT "会议室占用时间表"');
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
