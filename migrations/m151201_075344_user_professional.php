<?php

use yii\db\Schema;
use app\components\Migration;

class m151201_075344_user_professional extends Migration
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
    public $column = '';

    public function up()
    {
        $sql = "ALTER TABLE $this->table 
            ADD COLUMN user_professional  varchar(255) NULL DEFAULT 0 COMMENT '专业职称（profile前暂用）' AFTER user_card_number
            ";
        $this->execute($sql);
    }

    public function down()
    {
        $this->dropColumn($this->table,'user_professional');
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
