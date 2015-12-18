<?php

use yii\db\Schema;
use app\components\Migration;

class m151218_073254_alter_fields_about_meeting extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%meeting_room}}';
    /**
     * Table name of which to be handled
     * @var string
     */
    public $table1 = '{{%flow_meeting}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->dropColumn($this->table1, 'occupied');
        $this->addColumn($this->table, 'occupied', 'TEXT COMMENT "会议室占用情况,json, [\'8\',\'8:30\']"');
    }

    public function down()
    {
        $this->addColumn($this->table1, 'occupied', 'TEXT COMMENT "会议室占用情况,json, [\'8\',\'8:30\']"');
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
