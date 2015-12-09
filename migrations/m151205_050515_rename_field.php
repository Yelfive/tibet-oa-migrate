<?php

use yii\db\Schema;
use app\components\Migration;

class m151205_050515_rename_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%files}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->renameColumn($this->table,'file_random_name','file_original_name');
    }

    public function down()
    {
        $this->renameColumn($this->table,'file_original_name','file_random_name');
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
