<?php

use yii\db\Schema;
use app\components\Migration;

class m151123_015110_drop_index_in_nodes extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%workflow_nodes}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'node_index';
    
    public function up()
    {
        $this->dropColumn($this->table, $this->column);
    }

    public function down()
    {
        $this->addColumn($this->table, $this->column, 'INT COMMENT "节点索引、顺序"');
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
