<?php

use yii\db\Schema;
use app\components\Migration;

class m151015_094358_role_add_field extends Migration
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
    public $column = 'parent_id';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"bigint NULL COMMENT '父亲组织的id' AFTER deleted");
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
