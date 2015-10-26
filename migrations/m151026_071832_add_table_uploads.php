<?php

use yii\db\Schema;
use app\components\Migration;

class m151026_071832_add_table_uploads extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%uploads}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
    $sql = "CREATE TABLE $this->table (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL COMMENT '上传文件名',
      `description` varchar(1000) DEFAULT '' COMMENT '描述信息',
      `extra` text COMMENT '其他信息',
      `path` varchar(1000) DEFAULT '' COMMENT '储存路径',
      `type` tinyint(2) DEFAULT '0' COMMENT '类型，1=安装包',
      `status` tinyint(2) DEFAULT '0' COMMENT '状态(type相关联)，0=默认，1=已安装，-1=解压失败',
      `created_by` int(11) NOT NULL COMMENT '创建者id',
      `created_at` int(11) NOT NULL COMMENT '创建时间',
      `updated_by` int(11) DEFAULT '0' COMMENT '更新人id',
      `updated_at` int(11) DEFAULT '0' COMMENT '更新时间',
      `deleted` tinyint(4) DEFAULT '0' COMMENT '软删除 1=已删除，0=未删除',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=9 COMMENT '安装模块上传记录' DEFAULT CHARSET=utf8;
    ";
$this->execute($sql);
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
