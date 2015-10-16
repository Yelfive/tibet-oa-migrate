<?php

use yii\db\Schema;
use app\components\Migration;

class m151016_062241_chat_group_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%chat_group}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->addColumn($this->table,'group_avatar',"varchar(256) NULL COMMENT '角色名称'");
    }

    public function down()
    {
        $this->dropColumn($this->table,'group_avatar');
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
