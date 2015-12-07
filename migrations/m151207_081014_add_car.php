<?php

use yii\db\Schema;
use app\components\Migration;

class m151207_081014_add_car extends Migration
{
    public $tables = [
        '{{%cars}}' => [
            [
                'car_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'car_license_num' => 'CHAR(13) NOT NULL COMMENT "车牌号"',
                'car_type' => 'TINYINT NOT NULL COMMENT "车型：1=小车，2=小面包，2=大面包"',
                'car_model' => 'VARCHAR(100) NOT NULL COMMENT "车辆型号"',
                'car_seats_num' => 'INT NOT NULL COMMENT "座位数"',
                'status' => 'TINYINT COMMENT "车辆状态:-1=报废,1=在库,2=出勤e.t.c"',
            ],
            'ENGINE=InnoDB CHARSET=UTF8 COMMENT="车辆记录"',
        ],

        '{{%flow_car}}' => [
            [
                'apply_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'status' => 'TINYINT NOT NULL DEFAULT 0 COMMENT "处理状态：0=未处理，1=通过，2=未通过"',
                'created_by_name' => 'VARCHAR(50) NOT NULL COMMENT "请假人名称"',
                'used_by' => 'INT UNSIGNED NOT NULL COMMENT "使用人id"',
                'used_by_name' => 'VARCHAR(50) NOT NULL COMMENT "使用人名称"',
                'used_by_tel' => 'VARCHAR(20) NOT NULL COMMENT "使用人联系方式"',
                'passenger_count' => 'INT UNSIGNED NOT NULL COMMENT "乘坐人数"',
                'car_type' => 'TINYINT UNSIGNED NOT NULL COMMENT "申请的车辆类型"',
                'used_at' => 'INT UNSIGNED NOT NULL COMMENT "用车时间"',
                'waiting_spot' => 'VARCHAR(1000) NOT NULL COMMENT "待车地点"',
                'destination' => 'VARCHAR(1000) NOT NULL COMMENT "目的地"',
                'reason' => 'VARCHAR(1000) NOT NULL COMMENT "事由"',
                'car_id' => 'INT UNSIGNED DEFAULT 0 COMMENT "批准de车辆id"',
            ],
            'ENGINE=InnoDB CHARSET=UTF8 COMMENT="车辆申请"',
        ]
    ];

    public function safeUp()
    {
        foreach ($this->tables as $table => $info) {
            $this->createTableWithBaseFields($table, $info[0], $info[1]);
        }
    }

    public function safeDown()
    {
        foreach ($this->tables as $table => $info) {
            $this->dropTable($table);
        }
    }

}
