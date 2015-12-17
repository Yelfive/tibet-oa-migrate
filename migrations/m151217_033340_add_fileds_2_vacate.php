<?php

use yii\db\Schema;
use app\components\Migration;

class m151217_033340_add_fileds_2_vacate extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%flow_vacate}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->renameColumn($this->table, 'from', 'from_date');
        $this->renameColumn($this->table, 'to', 'to_date');
        $type = 'TINYINT NOT NULL COMMENT "1=上午，2=下午"';
        $this->addColumn($this->table, 'from_time', $type);
        $this->addColumn($this->table, 'to_time', $type);
    }

    public function down()
    {
        $this->renameColumn($this->table, 'from_date', 'from');
        $this->renameColumn($this->table, 'to_date', 'to');
        $this->dropColumn($this->table, 'from_time');
        $this->dropColumn($this->table, 'to_time');
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
