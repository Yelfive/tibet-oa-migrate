<?php

use yii\db\Schema;
use app\components\Migration;

class m160107_061430_add_field_to_siderbar extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%notify_sidebar}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'flag';
    
    public function up()
    {
        $this->addColumn($this->table, $this->column, 'VARCHAR(50) COMMENT "标识"');
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
