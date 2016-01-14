<?php

use yii\db\Schema;
use app\components\Migration;

class m151203_031514_add_process extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%process}}';
    
    /**
     * Field name of which to be handled
     * @var array
     */
    public $columns = [
        'pid' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'p_type' => 'VARCHAR(20) NOT NULL COMMENT "进程类型，model name,in lower case"',
        'p_fk' => 'INT UNSIGNED NOT NULL COMMENT "外键，关联p_type"',
        'p_index' => 'INT UNSIGNED NOT NULL COMMENT "进程索引，顺序"',
        'apply_to' => 'INT UNSIGNED NOT NULL COMMENT "审批人id"',
        'apply_to_name' => 'VARCHAR(100) NOT NULL COMMENT "审批人名称"',
        'p_status' => 'TINYINT DEFAULT 0 COMMENT "处理状态:0=未处理，1=通过，-1=不通过"',
    ];
    
    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->columns, 'ENGINE=InnoDB CHARSET=UTF8 COMMENT="流程处理进度表"');
        $this->addColumn('{{%vacate}}', 'status', 'TINYINT NOT NULL DEFAULT 0 COMMENT "处理状态：0=未处理，1=通过，-1=未通过"');
    }

    public function down()
    {
        $this->dropTable($this->table);
        $this->dropColumn('{{%vacate}}', 'status');
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
