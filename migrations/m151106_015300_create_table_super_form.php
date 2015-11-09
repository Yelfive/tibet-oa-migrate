<?php

use yii\db\Schema;
use app\components\Migration;

class m151106_015300_create_table_super_form extends Migration
{
    /**
     * Table name of which to be handled
     * @var string
     */
    public $table = '{{%super_form}}';

    /**
     * Field name of which to be handled
     * @var string
     */
    public $columns = [
        'sf_id' => 'pk',
        'form_name' => 'VARCHAR(100) NOT NULL COMMENT "表单名称"',
        'form_map' => 'text COMMENT "表单字段映射"',
        'status' => 'TINYINT DEFAULT 1 COMMENT "状态，1启用，0，禁用"',
        'type' => 'TINYINT DEFAULT 2 COMMENT "1=系统表单（模板），2=用户表单"',
        'department_id' => 'BIGINT(20) COMMENT "模板所属部门id"',
        'created_by' => 'INT COMMENT "创建人"',
        'updated_by' => 'INT COMMENT "更新人"',
        'created_at' => 'INT COMMENT "创建时间"',
        'updated_at' => 'INT COMMENT "更新人"',
        'deleted' => 'TINYINT COMMENT "是否删除"',

    ];
    public function up()
    {
        $this->createTable($this->table, $this->columns, 'ENGINE=InnoDb COMMENT="记录超级表单"');
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
