<?php

use yii\db\Schema;
use app\components\Migration;

class m151029_023041_chat_log_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%chat_log}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'to_sex';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint NULL DEFAULT 1 comment '如果给用户发送则有用户性别字段，1=男,2=女'");
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
