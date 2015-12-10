<?php

use yii\db\Schema;
use app\components\Migration;

class m151208_092419_add_meeting_room_related extends Migration
{
    public $tables = [
        '{{%meeting_room}}' => [
            [
                'room_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'status' => 'TINYINT NOT NULL DEFAULT 1 COMMENT "会议室状态,-1=禁用，1=启用"',
                'room_building' => 'VARCHAR(1000) NOT NULL COMMENT "会议室所在大楼"',
                'room_floor' => 'VARCHAR(10) NOT NULL COMMENT "楼层"',
                'room_location' => 'VARCHAR(255) NOT NULL UNIQUE COMMENT "会议室位置"',
                'room_name' => 'VARCHAR(255) NOT NULL UNIQUE COMMENT "会议室名称"',
                'room_type' => 'TINYINT NOT NULL COMMENT "会议室分类:1=视频会议室，2=一般会议室"',
                'room_capability' => 'SMALLINT UNSIGNED NOT NULL COMMENT "会议室容量，最大值65535"',
                'room_utilities' => 'VARCHAR(100) COMMENT "拥有设备"',
            ],
            'ENGINE=InnoDB CHARSET=UTF8 COMMENT "会议室"',
        ],
        '{{%flow_meeting}}' => [
            [
                'meeting_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'room_id' => 'INT UNSIGNED NOT NULL COMMENT "会议室id"',
                'status' => 'TINYINT DEFAULT 0 COMMENT "审批状态：-1=驳回，0=未处理，1=通过"',
                'meeting_topic' => 'VARCHAR(255) NOT NULL COMMENT "会议主题"',
                'meeting_start_at' => 'INT UNSIGNED NOT NULL COMMENT "会议开始时间"',
                'meeting_end_at' => 'INT UNSIGNED NOT NULL COMMENT "会议结束时间"',
                'participant_count' => 'SMALLINT UNSIGNED NOT NULL COMMENT "参会人数"',
                'participants' => 'TEXT NOT NULL COMMENT "参会人员"',
                'meeting_brief' => 'TEXT COMMENT "会议说明"',
                'apply_to' => 'INT UNSIGNED NOT NULL COMMENT "报批对象id"',
                'apply_to_name' => 'VARCHAR(50) NOT NULL COMMENT "报批对象名称"',
            ],
            'ENGINE=InnoDB CHARSET=UTF8 COMMENT "会议流程"',
        ],
        '{{%room_utility}}' => [
            [
                'utility_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'utility_name' => 'VARCHAR(255) NOT NULL COMMENT "设备名称"'
            ],
            'ENGINE=InnoDB CHARSET=UTF8 COMMENT "会议室设备"',
        ],
    ];

    public function safeUp()
    {
        $this->createTablesWithBaseFields($this->tables);
    }

    public function safeDown()
    {
        $this->dropTables($this->tables);
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
