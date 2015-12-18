<?php

use yii\db\Schema;
use app\components\Migration;

class m151218_032349_init_forum_board extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%forum_board}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $this->truncateTable($this->table);
        $sql = <<<SQL
INSERT INTO {$this->table} VALUES ('1001', '0', '生活交流', '生活交流', '0', '13', '1', null, '13', null, null, '0', '');
INSERT INTO {$this->table} VALUES ('1002', '0', '活动健身', '活动健身', '0', '13', '1', null, '13', null, null, '0', '');
INSERT INTO {$this->table} VALUES ('1003', '0', '公开问答', '公开问答', '0', '13', '1', null, '13', null, null, '0', '');
SQL;
        $this->execute($sql);


    }

    public function down()
    {
        echo "m151218_032349_init_forum_board cannot be reverted.\n";

        return false;
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
