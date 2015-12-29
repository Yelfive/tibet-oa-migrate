<?php

use yii\db\Schema;
use app\components\Migration;

class m151229_053912_user_state extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%user_state}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $columns = [
        'us_id' => 'INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'user_id' => 'INT UNSIGNED NOT NULL',
        'user_fullname' => 'VARCHAR(255) NOT NULL',
        'extra' => 'TEXT COMMENT "其余字段,json"',
    ];
    
    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->columns);
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {g
    }
    
    public function safeDown()
    {
    }
    */
}
