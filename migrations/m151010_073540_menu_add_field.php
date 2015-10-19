<?php

use yii\db\Schema;
use app\components\Migration;

class m151010_073540_menu_add_field extends Migration
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
    public $column = 'display_order';
    
    public function up()
    {
        $this->addColumn($this->table,'display_order',"int not NULL COMMENT '同级菜单显示顺序'");
        $this->addColumn($this->table,'deleted',"tinyint default 1 not NULL COMMENT '软删除1为未删除'");
    }

    public function down()
    {
        $this->dropColumn($this->table,'display_order');
        $this->dropColumn($this->table,'deleted');
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
