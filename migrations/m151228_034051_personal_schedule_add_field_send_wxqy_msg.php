<?php

use yii\db\Schema;
use app\components\Migration;

class m151228_034051_personal_schedule_add_field_send_wxqy_msg extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%personal_schedule}}';
    public $table1 = '{{%work_schedule}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'send_wxqy_msg';
    public $column1 = 'viewed';
    public $column2 = 'read_user_ids';

    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint not null default 0 COMMENT '微信企业信息发送状态1=已发送，0=未发送'");
        $this->addColumn($this->table,$this->column1,"tinyint not null default 0 COMMENT '是否已查看1=已查看，0=未查看'");
        $this->addColumn($this->table1,$this->column2,"text not null default '' COMMENT '查看过排班的用户id逗号分隔'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
        $this->dropColumn($this->table,$this->column1);
        $this->dropColumn($this->table1,$this->column2);

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
