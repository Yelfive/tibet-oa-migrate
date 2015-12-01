<?php

use yii\db\Schema;
use app\components\Migration;

class m151130_085046_add_table_vacate_related extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%vacate}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = [
        'vacate_id' => 'INT UNSIGNED AUTO_INCREMENT PRIMARY KEY',
        'vacate_type' => 'TINYINT NOT NULL COMMENT "1=公休假，2=探亲假，3=事假，4=病假，5=开会，6=外出，7=其他"',
        'from' => 'INT UNSIGNED NOT NULL COMMENT "请假开始时间"',
        'to' => 'INT UNSIGNED NOT NULL COMMENT "请假结束时间"',
        'duration' => 'DECIMAL(5,1) NOT NULL COMMENT "请假天数"',
        'destination' => 'VARCHAR(1000) COMMENT "目的地，json"',
        'reason' => 'VARCHAR(1000) NOT NULL COMMENT "事由"',
        'apply_to' => 'INT UNSIGNED NOT NULL COMMENT "审核人ID"',
        'apply_to_name' => 'VARCHAR(50) NOT NULL COMMENT "审核人名称"',
        'created_by_name' => 'VARCHAR(50) NOT NULL COMMENT "请假人名称"',
    ];
    
    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->column);
    }

    public function down()
    {
        $this->dropTable($this->table, $this->column);
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
