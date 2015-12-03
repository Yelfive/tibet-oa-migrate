<?php

use yii\db\Schema;
use app\components\Migration;

class m151201_023816_modify_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%forum_board}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
ALTER TABLE {$this->table}
MODIFY COLUMN owner_id  varchar(255) NOT NULL COMMENT '版主用户ID' AFTER forum_id;
SQL;
        $this->execute($sql);
        $this->addColumn($this->table,'icon',"varchar(255) NOT NULL COMMENT '版块模板的Icon'");

    }

    public function down()
    {
        $this->dropColumn($this->table,'icon');
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
