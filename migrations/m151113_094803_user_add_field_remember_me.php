<?php

use yii\db\Schema;
use app\components\Migration;

class m151113_094803_user_add_field_remember_me extends Migration
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
    public $column = 'remember_me_days';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"int NULL DEFAULT 7 COMMENT '记住密码的时间，默认记住7天'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
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
