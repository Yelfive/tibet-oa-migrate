<?php

use yii\db\Schema;
use app\components\Migration;

class m151105_102617_folder_add_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%folder}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'parent_id';
    public $column1 = 'after_id';

    public function up()
    {
        $this->addColumn($this->table,$this->column,"int NULL COMMENT '父亲组织的id' AFTER deleted");
        $this->addColumn($this->table,$this->column1,"int NULL COMMENT '节点在哪位兄弟之后的兄弟id' AFTER parent_id");
        $this->alterColumn($this->table,'folder_id','integer(11) NOT NULL AUTO_INCREMENT FIRST ');
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
