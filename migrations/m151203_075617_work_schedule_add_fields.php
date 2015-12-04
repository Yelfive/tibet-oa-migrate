<?php

use yii\db\Schema;
use app\components\Migration;

class m151203_075617_work_schedule_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%work_schedule}}';
    public $table_personal_schedule = '{{%personal_schedule}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $this->addColumn($this->table,'company_id',"int NOT NULL DEFAULT 0 COMMENT '排班所属的单位ID'");
        $this->addColumn($this->table,'department_id',"int NOT NULL DEFAULT 0 COMMENT '排班所属的部门ID'");
        $this->addColumn($this->table_personal_schedule,'important_level',"tinyint NOT NULL DEFAULT 1 COMMENT '重要级别，值越大越重要，1=低，2=中，3=高'");
        $this->addColumn($this->table_personal_schedule,'is_finish',"tinyint NOT NULL DEFAULT 0 COMMENT '改日历是否完成1=完成，0=未完成'");

    }

    public function down()
    {
        $this->dropColumn($this->table,'company_id');
        $this->dropColumn($this->table,'department_id');
        $this->dropColumn($this->table_personal_schedule,'important_level');
        $this->dropColumn($this->table_personal_schedule,'is_finish');
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
