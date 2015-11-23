<?php

use yii\db\Schema;
use app\components\Migration;

class m151120_081203_workflow_add_flow_type extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%workflow}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'flow_type';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint NULL DEFAULT 0 COMMENT '日志类型：1=请假，2=车辆'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
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
