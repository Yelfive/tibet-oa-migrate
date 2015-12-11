<?php

use yii\db\Schema;
use app\components\Migration;

class m151211_022704_add_salary_slip extends Migration
{
    public $tables = [
        '{{%salary_slip}}' => [
            [
                'slip_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'slip_year' => 'SMALLINT NOT NULL COMMENT "工资发放年份"',
                'slip_month' => 'TINYINT NOT NULL COMMENT "工资发放月份"',
                'error' => 'TEXT COMMENT "JSON string indicates error when importing"',
                'status' => 'TINYINT DEFAULT 0 COMMENT "0=未处理，1=发布"',
                'personal_sn' => 'VARCHAR(15) COMMENT "人员编号"',
                'name' => 'VARCHAR(50) COMMENT "姓名"',
                'duty_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "职务工资"',
                'level_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "级别工资"',
                'post_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "岗位工资"',
                'tech_grade_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "技术等级工资"',
                'base_salary' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "基本工资倍数"',
                'allowance' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "津补贴"',
                'inspect_discipline_allowance' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "纪检办案补贴"',
                'tibet_leader_allowance' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "藏族干部地贴"',
                'single_child_allowance' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "独子费"',
                'housing_allowance' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "住房补贴"',
                'tibet_working_experience' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "在藏折算工龄补贴"',
                'total_salary' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "应发合计"',
                'electric' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "电费"',
                'water' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "水费"',
                'rent' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "房租"',
                'endowment_insurance' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "养老保险金"',
                'health_stuff' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "卫生收视费"',
                'medical_insurance' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "医疗保险"',
                'reserved_fund' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "公积金"',
                'allowance_discount' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "津补贴扣回"',
                'total_discount' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "扣款合计"',
                'reality' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "实发合计"',
            ],
            'ENGINE=InnoDB CHARSET=UTF8 COMMENT "工资条"'
        ],
    ];
    
    public function up()
    {
        $this->createTablesWithBaseFields($this->tables);
    }

    public function down()
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
