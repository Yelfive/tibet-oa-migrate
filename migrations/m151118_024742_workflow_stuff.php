<?php

use yii\db\Schema;
use app\components\Migration;

class m151118_024742_workflow_stuff extends Migration
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
    public $column = 'node_privilege';
    
    public function up()
    {
        $this->renameColumn($this->table, $this->column, 'node_in_charge');
    }

    public function down()
    {
        $this->renameColumn($this->table, 'node_in_charge',  $this->column);
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
