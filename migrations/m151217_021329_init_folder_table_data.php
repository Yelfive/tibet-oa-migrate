<?php

use yii\db\Schema;
use app\components\Migration;

class m151217_021329_init_folder_table_data extends Migration
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
INSERT INTO oa_folder VALUES ('1', 'root', '', 'root', 'root', 'root', '0', '1', '6', '0', null, null, '0', null, '0', '0', '0', '0');
INSERT INTO oa_folder VALUES ('2', '邮件类文件夹', '', '邮件类的文件夹', 'yjlwjj', 'youjianleiwenjianjia', '1', '2', '3', '1', '0', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO oa_folder VALUES ('3', '文件共享类文件夹', '/data/upload/file_share/upload/folder_3', '文件共享类文件夹', 'wjgxlwjj', 'wenjiangongxiangleiwenjianjia', '2', '4', '5', '1', '1449285431', '1449289478', '0', '0', '0', '1', '0', '1');
ALTER TABLE oa_folder AUTO_INCREMENT=100;
SQL;
        $this->truncateTable($this->table);
        $this->execute($sql);

    }

    public function down()
    {
//        echo "m151217_021329_init_folder_table_data cannot be reverted.\n";
        return true;
//        return false;
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
