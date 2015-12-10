<?php

use yii\db\Schema;
use app\components\Migration;

class m151208_062857_menu_add_level_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%menu}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'level';
    
    public function up()
    {

        $this->addColumn($this->table,$this->column,"tinyint NOT NULL DEFAULT 0 COMMENT '菜单级别,1=一级，2=二级，3=三级,以此类推'");

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
