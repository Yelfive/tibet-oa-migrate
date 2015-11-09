<?php

use yii\db\Schema;
use app\components\Migration;

class m151109_064153_modify_comment extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%mail_log}}';
    public $table1 = '{{%send_mail_log}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $this->dropTable($this->table);
        $sql = <<<SQL
        ALTER TABLE {$this->table1}
MODIFY COLUMN deleted  tinyint(4) NULL DEFAULT 0 COMMENT '软删除 1=已删除，0=未删除,2=永久删除' AFTER updated_by;
SQL;
        $this->execute($sql);


    }

    public function down()
    {
        echo "m151109_064153_modify_comment cannot be reverted.\n";

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
