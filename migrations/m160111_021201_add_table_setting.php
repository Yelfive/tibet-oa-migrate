<?php

use yii\db\Schema;
use app\components\Migration;

class m160111_021201_add_table_setting extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%setting}}';
    
    /**
     * Field name of which to be handled
     * @var array
     */
    public $columns = [
        'id' => 'INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
        'name' => 'VARCHAR(255) NOT NULL COMMENT "key"',
        'setting' => 'VARCHAR(255) COMMENT "value"',
    ];
    
    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->columns);
        $this->createIndex('name', $this->table, 'name', true);
    }

    public function down()
    {
        $this->dropTable($this->table);
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
