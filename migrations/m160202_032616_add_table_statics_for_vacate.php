<?php

use yii\db\Schema;
use app\components\Migration;

class m160202_032616_add_table_statics_for_vacate extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%statics_vacate}}';
    
    /**
     * Field name of which to be handled
     * @var array
     */
    public $columns = [
        'sv_id' => 'INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
        'vacate_id' => 'INT UNSIGNED NOT NULL',
        'date' => 'INT NOT NULL COMMENT "请假日期"',
        'full_day' => 'TINYINT DEFAULT 1 COMMENT "是否全天,0=半天，1=全天"',
    ];
    
    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->columns, 'ENGINE=InnoDB CHARSET=UTF8 COMMENT "请假统计"');
    }

    public function down()
    {
        $this->dropTable($this->table);
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
