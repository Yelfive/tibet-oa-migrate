<?php

use yii\db\Schema;
use app\components\Migration;

class m160114_023653_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%flow_reimburse}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = 'flow_proof';

    public $t = ['flow_reimburse', 'flow_car', 'flow_vacate'];
    
    public function up()
    {
        $this->addColumn($this->table, 'extra', 'TEXT COMMENT "其他信息（字段e.t.c）"');
//        array_walk($this->t, function ($v) {
//             $this->addColumn("{{%$v}}", $this->column, 'TEXT COMMENT "流程证明"');
//        });
    }

    public function down()
    {
        $this->dropColumn($this->table, 'extra');
//        array_walk($this->t, function ($v) {
//            $this->dropColumn("{{%$v}}", $this->column);
//        });
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
