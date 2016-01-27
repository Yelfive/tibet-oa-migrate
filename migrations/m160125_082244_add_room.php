<?php

use yii\db\Schema;
use app\components\Migration;

class m160125_082244_add_room extends Migration
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
    public $column = 'notify_type';
    
    public function up()
    {
        $this->addColumn($this->table, $this->column, 'VARCHAR(50) COMMENT "通知类型"');
    }

    public function down()
    {
        $this->dropColumn($this->table, $this->column);
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
