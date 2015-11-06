<?php

use yii\db\Schema;
use app\components\Migration;

class m151106_033438_folder_add_field extends Migration
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
    public $column = 'can_be_deleted';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint NULL DEFAULT 0 COMMENT '文件夹是否可以被删除,1=是，0=否'");
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
