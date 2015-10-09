<?php

use yii\db\Schema;
use app\components\Migration;

class m151009_033754_add_fields_in_user extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%user}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->addColumn($this->table,'password_hash','varchar(100) COLLATE utf8_bin DEFAULT NULL');
        $this->addColumn($this->table,'password_reset_token','varchar(100) COLLATE utf8_bin DEFAULT NULL');
        $this->addColumn($this->table,'auth_key','varchar(100) COLLATE utf8_bin DEFAULT NULL');
        $this->addColumn($this->table,'access_token','varchar(100) COLLATE utf8_bin DEFAULT NULL');
    }

    public function down()
    {
        $this->dropColumn($this->table,'password_hash');
        $this->dropColumn($this->table,'password_reset_token');
        $this->dropColumn($this->table,'auth_key');
        $this->dropColumn($this->table,'access_token');
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
