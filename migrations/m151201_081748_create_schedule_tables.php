<?php

use yii\db\Schema;
use app\components\Migration;

class m151201_081748_create_schedule_tables extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table_personal_schedule = '{{%personal_schedule}}';
    public $table_work_schedule = '{{%work_schedule}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE {$this->table_personal_schedule} (
id  int NOT NULL AUTO_INCREMENT ,
content  text NOT NULL COMMENT '日程内容' ,
from_fullname  varchar(255) NOT NULL ,
from_user_sex  tinyint NOT NULL DEFAULT 1 COMMENT '1=男，2=女' ,
begain_time  datetime NOT NULL DEFAULT 0 COMMENT '开始时间' ,
end_time  datetime NOT NULL DEFAULT 0 COMMENT '结束时间' ,
remind_time_unit  tinyint NOT NULL DEFAULT 1 COMMENT '1=小时，2=分钟' ,
remind_time  tinyint NOT NULL DEFAULT 1 COMMENT '小时或分钟数量' ,
created_by  int NOT NULL DEFAULT 0 COMMENT '创建人' ,
updated_by  int NOT NULL DEFAULT 0 COMMENT '更新人' ,
created_at  int NOT NULL DEFAULT 0 COMMENT '创建时间' ,
updated_at  int NOT NULL DEFAULT 0 COMMENT '更新时间' ,
deleted  tinyint NOT NULL DEFAULT 0 ,
PRIMARY KEY (id),
INDEX idx_created_by (created_by) USING BTREE
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
;


CREATE TABLE {$this->table_work_schedule} (
id  int NOT NULL AUTO_INCREMENT COMMENT '主键' ,
title  varchar(255) NOT NULL COMMENT '排班标题' ,
desc  text NOT NULL COMMENT '排班描述' ,
user_ids  text NOT NULL COMMENT '排班涉及到的用户id，逗号分隔' ,
from_fullname  varchar(255) NOT NULL COMMENT '创建者姓名' ,
duty_leader_id  int NOT NULL DEFAULT 1 COMMENT '值班领导用户ID' ,
duty_leader_tel  int NOT NULL COMMENT '值班领导联系电话' ,
duty_leader_fullname  varchar(255) NOT NULL DEFAULT 0 COMMENT '值班领导姓名' ,
begain_time  datetime NOT NULL DEFAULT  COMMENT '开始' ,
end_time  datetime NOT NULL DEFAULT  COMMENT '结束时间' ,
created_by  int NOT NULL DEFAULT 0 COMMENT '创建人' ,
updated_by  int NOT NULL DEFAULT 0 COMMENT '更新人' ,
created_at  int NOT NULL DEFAULT 0 COMMENT '创建时间' ,
updated_at  int NOT NULL DEFAULT 0 COMMENT '更新时间' ,
deleted  tinyint NOT NULL DEFAULT 0 ,
PRIMARY KEY (id),
INDEX idx_created_by (created_by) USING BTREE ,
INDEX idx_leader_id (duty_leader_id) USING BTREE
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
;



SQL;





    }

    public function down()
    {
        echo "m151201_081748_create_schedule_tables cannot be reverted.\n";

        return false;
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
