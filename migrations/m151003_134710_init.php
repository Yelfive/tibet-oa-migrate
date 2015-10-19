<?php

use yii\db\Schema;
use app\components\Migration;

class m151003_134710_init extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%table}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = file_get_contents(__DIR__.'/init.migrate');
        //echo $sql;
        //return false;
        $this->execute($sql);
    }

    public function down()
    {

        $sql = <<<SQL
drop table if exists oa_app_module;

drop table if exists oa_app_module_config;

drop table if exists oa_chat_group;

drop table if exists oa_chat_group_user;

drop table if exists oa_chat_log;

drop table if exists oa_chat_strategy;

drop table if exists oa_collection;

drop table if exists oa_files;

drop table if exists oa_group_user;

drop table if exists oa_mail_log;

drop table if exists oa_manage_class;

drop table if exists oa_module_tables;

drop table if exists oa_notify;

drop table if exists oa_role;

drop table if exists oa_role_extend;

drop table if exists oa_sign_log;

drop table if exists oa_sms_log;

drop table if exists oa_task;

drop table if exists oa_task_class;

drop table if exists oa_user;

drop table if exists oa_user_group;

drop table if exists oa_user_role;

drop table if exists oa_user_role_extend;

drop table if exists oa_workflow_executor;

drop table if exists oa_workflow_node;

drop table if exists oa_workflow_process;
SQL;

        $this->execute($sql);
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
