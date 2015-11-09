<?php

use yii\db\Schema;
use app\components\Migration;

class m151106_075538_init_folder_table extends Migration
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
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
INSERT INTO {$this->table} VALUES ('1', 'root', 'root', 'root', 'root', '0', '1', '4', '0', null, null, '0', null, '0', '0', '0', '0');
INSERT INTO {$this->table} VALUES ('2', '邮件类文件夹', '邮件类的文件夹', 'yjlwjj', 'youjianleiwenjianjia', '1', '2', '3', '1', '0', '0', '0', '0', '0', '1', '0', '0');
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m151106_075538_init_folder_table cannot be reverted.\n";

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
