<?php

use yii\db\Schema;
use app\components\Migration;

class m151207_070354_work_schedule_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%work_schedule}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'schedule_date';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"date NOT NULL COMMENT '日程的日期'");

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
