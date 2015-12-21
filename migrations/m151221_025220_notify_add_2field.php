<?php

use yii\db\Schema;
use app\components\Migration;

class m151221_025220_notify_add_2field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%notify}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'top_begin_date';
    public $column1 = 'top_end_date';

    public function up()
    {
        $this->addColumn($this->table,$this->column,"date null COMMENT '置顶开始时间'");
        $this->addColumn($this->table,$this->column1,"date null COMMENT '置顶结束时间'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
        $this->dropColumn($this->table,$this->column1);
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
