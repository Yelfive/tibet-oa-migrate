<?php

use yii\db\Schema;
use app\components\Migration;

class m151209_033520_add_fields_2_meeting extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%flow_meeting}}';
    
    /**
     * Field names of which to be handled
     * @var array
     */
    public $columns = [
        'room_type' => 'TINYINT NOT NULL COMMENT "会议室分类:1=视频会议室，2=一般会议室" AFTER room_id',
        'room_building' => 'VARCHAR(1000) NOT NULL COMMENT "会议室所在大楼" AFTER room_id',
        'room_floor' => 'VARCHAR(10) NOT NULL COMMENT "楼层" AFTER room_id',
        'created_by_name' => 'VARCHAR(50) NOT NULL COMMENT "发起人名称" AFTER created_by'
    ];
    
    public function up()
    {
        foreach ($this->columns as $column => $type) {
            $this->addColumn($this->table, $column, $type);
        }
        $this->alterColumn($this->table, 'room_id', 'INT UNSIGNED COMMENT "会议室id,申请成功后填入"');
    }

    public function down()
    {
        foreach ($this->columns as $column => $type) {
            $this->dropColumn($this->table, $column);
        }
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
