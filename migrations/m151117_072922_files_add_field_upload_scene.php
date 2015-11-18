<?php

use yii\db\Schema;
use app\components\Migration;

class m151117_072922_files_add_field_upload_scene extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%files}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'upload_scene';
    
    public function up()
    {
        $this->addColumn($this->table,$this->column,"tinyint(4) NULL DEFAULT 1 COMMENT '文件上传场景，1=即时聊天上传；2=邮件附件；3=通知附件'");
    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
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
