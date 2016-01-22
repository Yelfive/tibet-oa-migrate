<?php

use yii\db\Schema;
use app\components\Migration;

class m160122_082337_article_add_field_comment_viewed extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%article}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'has_comment';
    
    public function up()
    {

        $this->addColumn($this->table,$this->column,"tinyint not null default 0 comment '文章作者对新评论是否查看过'");

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
