<?php

use yii\db\Schema;
use app\components\Migration;

class m151225_091023_personal_schedule_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%personal_schedule}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'remind_switch';
    
    public function up()
    {

        $this->addColumn($this->table,$this->column,"tinyint not null default 0 COMMENT '提醒开关，1=开，0=关'");

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
