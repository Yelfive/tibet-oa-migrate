<?php

use yii\db\Schema;
use app\components\Migration;

class m151016_061647_chat_group_user_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%chat_group_user}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
ALTER TABLE {$this->table}
ADD COLUMN user_fullname  varchar(255) NULL COMMENT '用户全名',
ADD COLUMN group_name  varchar(255) NULL COMMENT '角色名称';
SQL;
        $this->execute($sql);
    }

    public function down()
    {
        $this->dropColumn($this->table,'user_fullname');
        $this->dropColumn($this->table,'group_name');
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
