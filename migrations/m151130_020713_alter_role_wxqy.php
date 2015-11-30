<?php

use yii\db\Schema;
use app\components\Migration;

class m151130_020713_alter_role_wxqy extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%role}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = "ALTER TABLE $this->table
            ADD COLUMN wxid  int NULL COMMENT '部门在微信企业号中的编号' AFTER after_id,
            ADD COLUMN wxpid  int NULL COMMENT '部门在微信企业号中的父编号' AFTER wxid
            ";
        $this->execute($sql);
    }

    public function down()
    {
        $this->dropColumn($this->table,'wxid');
        $this->dropColumn($this->table,'wxpid');
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
