<?php

use yii\db\Schema;
use app\components\Migration;

class m151204_102348_modify_folder_files_table_field extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $files = '{{%files}}';
    public $folder = '{{%folder}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
ALTER TABLE {$this->files}
ADD COLUMN folder_id  int NOT NULL DEFAULT 0 COMMENT '文件所属的文件夹ID' AFTER upload_scene,
ADD COLUMN file_random_name  varchar(255) NOT NULL COMMENT '文件存储在磁盘磁盘上的名称' AFTER folder_id;
ALTER TABLE {$this->folder}
ADD COLUMN disk_path  varchar(1000) NOT NULL COMMENT '文件夹对应磁盘的路径' AFTER folder_name;
SQL;
        $this->execute($sql);


    }

    public function down()
    {
        $this->dropColumn($this->files,'folder_id');
        $this->dropColumn($this->files,'file_random_name');
        $this->dropColumn($this->folder,'disk_path');
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
