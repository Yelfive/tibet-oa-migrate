<?php

use yii\db\Schema;
use app\components\Migration;

class m160113_075215_workschedule_alter_field_type extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%work_schedule}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
ALTER TABLE {$this->table}
MODIFY COLUMN duty_leader_tel  varchar(20) NOT NULL DEFAULT ' ' COMMENT '值班领导联系电话' AFTER duty_leader_id;
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m160113_075215_workschedule_alter_field_type cannot be reverted.\n";

        return false;
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
