<?php

use yii\db\Schema;
use app\components\Migration;

class m151203_044315_add_table_templates extends Migration
{
    /**
     * Table name of which to be handled
     * @var string
     */
    public $table = '{{%message_templates}}';

    /**
     * Field name of which to be handled
     * @var string
     */
    public $column = [
        'tmpl_id' => 'INT UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT "模板编号"',
        'tmpl_content' => 'VARCHAR(1000) NULL COMMENT "模板内容"',
        'tmpl_type' => 'smallint(255) NULL DEFAULT 0 COMMENT "模板类型：0-未指定；1-通用；2-短信；3-邮件"',
        'tmpl_parameters' => 'smallint(255) NULL COMMENT "模板参数个数"',
        'created_by' => 'int(255) NULL COMMENT "创建人ID"',
        'created_at' => 'int(255) NULL COMMENT "创建时间"',
    ];

    public function up()
    {
        $this->createTableWithBaseFields($this->table, $this->column);
    }

    public function down()
    {
        $this->dropTable($this->table, $this->column);
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
