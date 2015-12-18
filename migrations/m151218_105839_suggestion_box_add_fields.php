<?php

use yii\db\Schema;
use app\components\Migration;

class m151218_105839_suggestion_box_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%suggestion_box}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'title';
    public $column1 = 'attachment';

    public function up()
    {

        $this->addColumn($this->table,$this->column,"varchar(255) not null comment '标题'");
        $this->addColumn($this->table,$this->column1,"text null comment '附件'");

    }

    public function down()
    {
        $this->dropColumn($this->table,$this->column);
        $this->dropColumn($this->table,$this->column1);
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
