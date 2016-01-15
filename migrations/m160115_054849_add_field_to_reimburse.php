<?php

use yii\db\Schema;
use app\components\Migration;

class m160115_054849_add_field_to_reimburse extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%flow_reimburse}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'proof_offline';
    
    public function up()
    {
        $this->addColumn($this->table, $this->column, 'TEXT COMMENT "上传线下证明，照片e.t.c"');
    }

    public function down()
    {
        $this->dropColumn($this->table, $this->column);
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
