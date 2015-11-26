<?php

use yii\db\Schema;
use app\components\Migration;

class m151126_030501_workflow_process_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%workflow_process}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
ALTER TABLE {$this->table}
ADD COLUMN flow_id  int NULL COMMENT '流程id' AFTER process_id,
ADD COLUMN zform_data_id  int NULL COMMENT 'z_form中对应的某条数据的id' AFTER flow_id;
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        $this->dropColumn($this->table,'flow_id');
        $this->dropColumn($this->table,'zform_data_id');
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
