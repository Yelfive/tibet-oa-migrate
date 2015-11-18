<?php

use yii\db\Schema;
use app\components\Migration;

class m151118_010054_alter_columnn_of_workflow extends Migration
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
    public $column = 'node_parent';
    
    public function up()
    {
        $this->alterColumn($this->table, $this->column, 'VARCHAR(255) NOT NULL COMMENT "节点父级"');
        $this->renameColumn($this->table, $this->column, 'node_parents');
    }

    public function down()
    {
        $this->alterColumn($this->table, 'node_parents', ' INT NOT NULL COMMENT "节点父级"');
        $this->renameColumn($this->table, 'node_parents', $this->column);
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
