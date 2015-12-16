<?php

use yii\db\Schema;
use app\components\Migration;

class m151215_103048_article_comment_add_field_view extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%article_comment}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'viewed';
    
    public function up()
    {

        $this->addColumn($this->table,$this->column,"tinyint not null default 0 comment '1=查看过，0=未查看'");
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
