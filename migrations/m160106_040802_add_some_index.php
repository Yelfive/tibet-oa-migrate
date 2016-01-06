<?php

use yii\db\Schema;
use app\components\Migration;

class m160106_040802_add_some_index extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%role}}';
    public $table1 = '{{%user_role}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
ALTER TABLE {$this->table}
ADD INDEX role_id_idx (role_id) USING BTREE ,
ADD INDEX left_level_idx (`left`, `level`) USING BTREE ;
ADD INDEX left_right_level_idx (`left`, `right`, `level`) USING BTREE ;
ALTER TABLE {$this->table1}
ADD INDEX type_uid_idx (`role_type`, `user_id`) ;
SQL;
    $this->execute($sql);

    }

    public function down()
    {
        echo "m160106_040802_add_some_index cannot be reverted.\n";

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
