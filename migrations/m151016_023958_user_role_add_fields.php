<?php

use yii\db\Schema;
use app\components\Migration;

class m151016_023958_user_role_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%user_role}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
ALTER TABLE {$this->table}
ADD COLUMN user_fullname  varchar(255) NULL COMMENT '用户全名' AFTER user_id,
ADD COLUMN role_type  tinyint NULL COMMENT '角色类型1公司，2部门，3职务' AFTER role_id,
ADD COLUMN role_name  varchar(1000) NULL COMMENT '角色名称' AFTER role_type;
SQL;

        $this->execute($sql);

    }

    public function down()
    {
        $this->dropColumn($this->table,'user_fullname');
        $this->dropColumn($this->table,'role_type');
        $this->dropColumn($this->table,'role_name');
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
