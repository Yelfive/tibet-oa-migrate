<?php

use yii\db\Schema;
use app\components\Migration;

class m151020_102302_add_belonged_module_2_menu extends Migration
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
    public $columns = [
        'belonged_module' => 'VARCHAR(50) DEFAULT "" COMMENT "所属模块"',
        'version' => 'VARCHAR(10) DEFAULT "0.0.0" COMMENT "模块版本号"'
    ];
    
    public function up()
    {
        foreach ($this->columns as $column => $type) {
            $this->addColumn($this->table, $column, $type);
        }
    }

    public function down()
    {
        foreach ($this->columns as $column => $type) {
            $this->dropColumn($this->table, $column);
        }
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
