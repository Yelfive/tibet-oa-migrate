<?php

use yii\db\Schema;
use app\components\Migration;

class m151030_061415_role_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%role}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = <<<SQL
ALTER TABLE {$this->table}
ADD COLUMN before_id  bigint NULL DEFAULT 0 AFTER parent_id,
ADD COLUMN after_id  bigint NULL DEFAULT 0 AFTER before_id;
SQL;
        $this->execute($sql);

    }

    public function down()
    {
        $this->dropColumn($this->table,'before_id');
        $this->dropColumn($this->table,'after_id');
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
