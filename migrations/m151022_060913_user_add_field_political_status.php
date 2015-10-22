<?php

use yii\db\Schema;
use app\components\Migration;

class m151022_060913_user_add_field_political_status extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%user}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'political_status';
    
    public function up()
    {

        $this->addColumn($this->table,$this->column,"tinyint NULL DEFAULT 4 COMMENT '政治面貌：1党员，2预备党员，3.团员，4群众'");

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
