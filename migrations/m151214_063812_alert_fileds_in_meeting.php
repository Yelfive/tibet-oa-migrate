<?php

use yii\db\Schema;
use app\components\Migration;

class m151214_063812_alert_fileds_in_meeting extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%flow_meeting}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->addColumn($this->table, 'occupied', 'TEXT COMMENT "会议室占用情况,json, [\'8\',\'8:30\']"');
    }

    public function down()
    {
        $this->dropColumn($this->table, 'occupied');
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
