<?php

use yii\db\Schema;
use app\components\Migration;

class m151102_092627_mail_add_fields extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%mail}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $comment = "{ 'user_ids': { 1: '张三[ zs@qq.com ]', 2: '李四[ ls@qq.com ]' }, 'department_ids': { 1: '部门1', 2: '部门2', }, 'company_ids': { 1: '公司1', 2: '公司2' }, 'group_ids': { 1: '组1', 2: '组2' }, 'duty_ids': { 1: '科长', 2: '副科长' } } 或者{'to_all':1}'";
        $comment = addslashes($comment);
        $this->addColumn($this->table,
                        'cc_to',
                        "varchar(65535) COLLATE utf8_bin DEFAULT NULL COMMENT '抄送给， ".$comment."'");
        $this->addColumn($this->table,
            'send_to',
            "varchar(65535) COLLATE utf8_bin DEFAULT NULL COMMENT '直接发送给，".$comment."'");
    }

    public function down()
    {
        $this->dropColumn($this->table,'cc_to');
        $this->dropColumn($this->table,'send_to');
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
