<?php

use yii\db\Schema;
use app\components\Migration;

class m151130_020034_alter_user_card_type extends Migration
{
    /**
     * Table name of which to be handled
     * @var string
     */
    public $table = '{{%user}}';

    /**
     * Field name of which to be handled
     * @var string
     */
    public $column = '';

    public function up()
    {
        $sql = "ALTER TABLE $this->table (
            MODIFY COLUMN 'user_type'  smallint(6) NULL DEFAULT 0 COMMENT '用户系统类型，1=部门系统管理员，2=，3=部门联系人' AFTER 'login_error_count',
            ADD COLUMN 'user_card_number'  varchar(20) NULL COMMENT '用户身份证号码|社会保障服务号' AFTER 'remember_me_days',
            ADD COLUMN 'user_department_role'  tinyint(255) NULL DEFAULT 0 COMMENT '部门内角色:默认0-普通员工；1-;2-;3-;4-部门副职领导;5-部门主管领导负责人' AFTER 'user_card_number'
            ";
        $this->execute($sql);
    }

    public function down()
    {
        $this->dropColumn($this->table,'user_card_number');
        $this->dropColumn($this->table,'user_department_role');
        echo "m151130_020034_alter_user_card_type cannot be reverted.\n";
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
