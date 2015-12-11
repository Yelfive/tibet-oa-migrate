<?php

use yii\db\Schema;
use app\components\Migration;

class m151210_032713_add_tables_salary_related extends Migration
{
    public $tables = [
//        '{{%salary_slip}}' => [
//            [
//                'slip_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
//                'personal_sn' => 'VARCHAR(5) NOT NULL COMMENT "人员编号"',
//                'name' => 'VARCHAR(50) NOT NULL COMMENT "姓名"',
//                'duty_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "职务工资"',
//                'level_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "级别工资"',
//                'post_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "岗位工资"',
//                'tech_grade_part' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "技术等级工资"',
//                'base_salary_mulriple' => 'DECIMAL(10,2) DEFAULT 0 COMMENT "基本工资倍数"',
//            ],
//            'ENGINE=InnoDB CHARSET=UTF8 COMMENT "工资条"'
//        ],
        '{{%flow_reimburse}}' => [
            [
                'reimburse_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'status' => 'TINYINT NOT NULL DEFAULT 0 COMMENT "审核状态：-1=驳回，0=未处理，1=通过"',
                'usage' => 'TINYINT NOT NULL COMMENT "费用用途：1=差旅费，2=餐费，3=路费，4=劳务费，5=医疗费，6=活动经费，7=办公用品费，8=办公用品购置费，9=独生子女医药费，10=其他"',
                'amount' => 'DECIMAL(15,2) NOT NULL COMMENT "报销金额"',
                'start_at' => 'INT UNSIGNED NOT NULL COMMENT "费用开始于"',
                'end_at' => 'INT UNSIGNED NOT NULL COMMENT "费用结束于"',
                'rmb_remark' => 'TEXT COMMENT "备注"',
                'apply_to' => 'INT UNSIGNED NOT NULL COMMENT "报批对象id"',
                'apply_to_name' => 'VARCHAR(50) NOT NULL COMMENT "报批对象名称"',
                'created_by_name' => 'VARCHAR(50) NOT NULL COMMENT "创建人名称"',
            ],
            'ENGINE=InnoDB CHARSET=UTF8 COMMENT "报销申请"'
        ],
    ];

    public function up()
    {
        $this->createTablesWithBaseFields($this->tables);
        $this->addColumn('{{%flow_car}}', 'apply_to', 'INT UNSIGNED NOT NULL COMMENT "报批人id" AFTER reason');
        $this->addColumn('{{%flow_car}}', 'apply_to_name', 'VARCHAR(50) NOT NULL COMMENT "报批人名称" AFTER apply_to');
    }

    public function down()
    {
        $this->dropTables($this->tables);
        $this->dropColumn('{{%flow_car}}', 'apply_to_name');
        $this->dropColumn('{{%flow_car}}', 'apply_to');
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
