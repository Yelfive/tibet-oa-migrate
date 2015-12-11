<?php

use yii\db\Schema;
use app\components\Migration;

class m151211_100024_update_menu extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%menu}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $this->truncateTable($this->table);
        $sql = <<<SQL
INSERT INTO oa_menu VALUES ('1', '设置', '/admin/menu', '0', 'admin/menu', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '1');
INSERT INTO oa_menu VALUES ('2', '用户', '/admin/user', '0', 'admin/user', '1', '1444486208', '1444486208', null, null, '2', '0', '', '0.0.0', '1');
INSERT INTO oa_menu VALUES ('3', '菜单设置', '/admin/menu', '1', 'admin/menu', '1', '1444486278', '1444486278', null, null, '1', '0', '', '0.0.0', '1');
INSERT INTO oa_menu VALUES ('4', '即时通讯', '/admin/chat/chat-log', '0', 'admin/chat/chat-log', '1', '1444486278', '1444486208', null, null, '3', '0', '', '0.0.0', '1');
INSERT INTO oa_menu VALUES ('5', '模块安装', '/admin/installer', '1', 'admin/installer', '1', '1444486278', '1444486208', null, null, '2', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('6', '聊天组管理', '/admin/chat/chat-group', '4', 'admin/chat/chat-group', '1', '1444486278', '1444486208', null, null, '2', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('7', '聊天记录', '/admin/chat/chat-log', '4', 'admin/chat/chat-log', '1', '1444486278', '1444486208', null, null, '1', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('8', '用户组', '/admin/user-group', '2', 'admin/user-group', '1', '1444486278', '1444486208', null, null, '2', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('9', '用户列表', '/admin/user', '2', 'admin/user', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('10', '通告', '/admin/notify', '27', 'admin/notify', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('11', '文件发送', '/admin/chat/files', '4', 'admin/chat/files', '1', '1444486278', '1444486208', null, null, '6', '1', '', '0.0.0', '0');
INSERT INTO oa_menu VALUES ('12', '组织架构', '/admin/role', '0', 'admin/role', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '1');
INSERT INTO oa_menu VALUES ('13', '用户收藏', '/admin/collection', '2', 'admin/collection', '1', '1444486278', '1444486208', null, null, '3', '1', '', '0.0.0', '0');
INSERT INTO oa_menu VALUES ('14', '职称', '/admin/role-extend', '12', 'admin/role-extend', '0', '1444486278', '1444486208', null, null, '3', '1', '', '0.0.0', '0');
INSERT INTO oa_menu VALUES ('15', '组织架构管理', '/admin/role', '12', 'admin/role', '1', '1444486278', '1444486208', null, null, '1', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('16', '部门', '/admin/role', '12', 'admin/role', '1', '1444486278', '1444486208', null, null, '2', '1', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('17', '邮件管理', '/admin/mail/send-mail-log', '27', 'admin/mail/send-mail-log', '1', null, null, null, null, '4', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('18', '短信管理', '/admin/sms-log', '4', 'admin/sms-log', '1', '1444486278', '1444486278', null, null, '4', '1', '', '0.0.0', '0');
INSERT INTO oa_menu VALUES ('19', '操作日志', '/admin/operation-log', '2', 'admin/operation-log', '1', null, null, null, null, '4', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('20', '通告管理', '/admin/notify', '10', 'admin/notify', '1', null, null, null, null, '1', '0', '', '0.0.0', '3');
INSERT INTO oa_menu VALUES ('21', '组织人员管理', '/admin/user-role', '12', 'admin/user-role', '1', null, null, null, null, '4', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('22', '聊天组人员归属', '/admin/chat/chat-group-user', '4', 'admin/chat/chat-group-user', '1', null, null, null, null, '3', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('23', '公告设置', '/admin/notify-config', '10', 'admin/notify-config', '1', null, null, null, null, '2', '0', '', '0.0.0', '3');
INSERT INTO oa_menu VALUES ('24', '工作流', '/admin/workflow/form', '0', 'admin/workflow/form', '1', null, null, null, null, '4', '0', '', '0.0.0', '0');
INSERT INTO oa_menu VALUES ('25', '超级表单', '/admin/workflow/form', '24', 'admin/workflow/form', '1', null, null, null, null, '1', '0', '', '0.0.0', '0');
INSERT INTO oa_menu VALUES ('26', '工作流节点', '/admin/workflow/flow', '24', 'admin/workflow/flow', '1', null, null, null, null, '1', '0', '', '0.0.0', '0');
INSERT INTO oa_menu VALUES ('27', '公共信息', '/admin/notify', '0', 'admin/notify', '1', null, null, null, null, '0', '0', '', '0.0.0', '1');
INSERT INTO oa_menu VALUES ('28', '资源共享', '/admin/folder', '27', 'admin/folder', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('29', '论坛', '/admin/forum/forum-board', '27', 'admin/forum/forum-board', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('30', '个人日程', '/admin/schedule/personal-schedule', '27', 'admin/schedule/personal-schedule', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('31', '排班记录', '/admin/schedule/work-schedule', '27', 'admin/schedule/work-schedule', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO oa_menu VALUES ('32', '论坛版块', '/admin/forum/forum-board', '29', 'admin/forum/forum-board', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO oa_menu VALUES ('33', '版块文章', '/admin/forum/article', '29', 'admin/forum/article', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO oa_menu VALUES ('34', '文章评论', '/admin/forum/article-comment', '29', 'admin/forum/article-comment', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO oa_menu VALUES ('35', '文件夹', '/admin/folder', '28', 'admin/folder', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO oa_menu VALUES ('36', '文件', '/admin/files', '28', 'admin/files', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');

SQL;
        $this->execute($sql);


    }

    public function down()
    {
        echo "m151211_100024_update_menu cannot be reverted.\n";

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
