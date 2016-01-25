<?php

use yii\db\Schema;
use app\components\Migration;

class m160125_032054_drop_key_in_room extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%meeting_room}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'room_location';
    
    public function up()
    {
        $this->dropIndex('room_location', $this->table);
        $this->dropIndex('room_name', $this->table);
    }

    public function down()
    {
        return true;
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
