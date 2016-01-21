<?php

use yii\db\Schema;
use app\components\Migration;

class m160121_072552_update_menu extends Migration
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
        $sql = <<<SQL
INSERT INTO {$this->table} VALUES ('1', '设置', '/admin/menu', '0', 'admin/menu', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '1');
INSERT INTO {$this->table} VALUES ('2', '用户', '/admin/user', '0', 'admin/user', '1', '1444486208', '1444486208', null, null, '2', '0', '', '0.0.0', '1');
INSERT INTO {$this->table} VALUES ('3', '菜单设置', '/admin/menu', '1', 'admin/menu', '1', '1444486278', '1444486278', null, null, '1', '0', '', '0.0.0', '1');
INSERT INTO {$this->table} VALUES ('4', '即时通讯', '/admin/chat/chat-log', '0', 'admin/chat/chat-log', '1', '1444486278', '1444486208', null, null, '3', '0', '', '0.0.0', '1');
INSERT INTO {$this->table} VALUES ('5', '模块安装', '/admin/installer', '1', 'admin/installer', '1', '1444486278', '1444486208', null, null, '2', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('6', '聊天组管理', '/admin/chat/chat-group', '4', 'admin/chat/chat-group', '1', '1444486278', '1444486208', null, null, '2', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('7', '聊天记录', '/admin/chat/chat-log', '4', 'admin/chat/chat-log', '1', '1444486278', '1444486208', null, null, '1', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('8', '用户组', '/admin/user-group', '2', 'admin/user-group', '1', '1444486278', '1444486208', null, null, '2', '1', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('9', '用户列表', '/admin/user', '2', 'admin/user', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('10', '通告&新闻', '/admin/notify', '27', 'admin/notify', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('11', '文件发送', '/admin/chat/files', '4', 'admin/chat/files', '1', '1444486278', '1444486208', null, null, '6', '1', '', '0.0.0', '0');
INSERT INTO {$this->table} VALUES ('12', '组织架构', '/admin/role', '0', 'admin/role', '1', '1444486278', '1444486208', null, null, '0', '0', '', '0.0.0', '1');
INSERT INTO {$this->table} VALUES ('13', '用户收藏', '/admin/collection', '2', 'admin/collection', '1', '1444486278', '1444486208', null, null, '3', '1', '', '0.0.0', '0');
INSERT INTO {$this->table} VALUES ('14', '职称', '/admin/role-extend', '12', 'admin/role-extend', '0', '1444486278', '1444486208', null, null, '3', '1', '', '0.0.0', '0');
INSERT INTO {$this->table} VALUES ('15', '组织架构管理', '/admin/role', '12', 'admin/role', '1', '1444486278', '1444486208', null, null, '1', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('16', '部门', '/admin/role', '12', 'admin/role', '1', '1444486278', '1444486208', null, null, '2', '1', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('17', '邮件管理', '/admin/mail/send-mail-log', '27', 'admin/mail/send-mail-log', '1', null, null, null, null, '4', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('18', '短信管理', '/admin/sms-log', '4', 'admin/sms-log', '1', '1444486278', '1444486278', null, null, '4', '1', '', '0.0.0', '0');
INSERT INTO {$this->table} VALUES ('19', '操作日志', '/admin/operation-log', '2', 'admin/operation-log', '1', null, null, null, null, '4', '1', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('20', '通告&新闻列表', '/admin/notify', '10', 'admin/notify', '1', null, null, null, null, '1', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('21', '组织人员管理', '/admin/user-role', '12', 'admin/user-role', '1', null, null, null, null, '4', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('22', '聊天组人员归属', '/admin/chat/chat-group-user', '4', 'admin/chat/chat-group-user', '1', null, null, null, null, '3', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('23', '设置', '/admin/notify-config', '10', 'admin/notify-config', '1', null, null, null, null, '2', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('24', '工作流', '/admin/workflow/form', '0', 'admin/workflow/form', '1', null, null, null, null, '4', '1', '', '0.0.0', '0');
INSERT INTO {$this->table} VALUES ('25', '超级表单', '/admin/workflow/form', '24', 'admin/workflow/form', '1', null, null, null, null, '1', '0', '', '0.0.0', '0');
INSERT INTO {$this->table} VALUES ('26', '工作流节点', '/admin/workflow/flow', '24', 'admin/workflow/flow', '1', null, null, null, null, '1', '0', '', '0.0.0', '0');
INSERT INTO {$this->table} VALUES ('27', '公共信息', '/admin/notify', '0', 'admin/notify', '1', null, null, null, null, '0', '0', '', '0.0.0', '1');
INSERT INTO {$this->table} VALUES ('28', '资源共享', '/admin/folder/index', '27', 'admin/folder/index', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('29', '论坛', '/admin/forum/forum-board', '27', 'admin/forum/forum-board', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('30', '个人日程', '/admin/schedule/personal-schedule', '27', 'admin/schedule/personal-schedule', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('31', '排班记录', '/admin/schedule/work-schedule', '27', 'admin/schedule/work-schedule', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('32', '论坛版块', '/admin/forum/forum-board', '29', 'admin/forum/forum-board', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('33', '版块文章', '/admin/forum/article', '29', 'admin/forum/article', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('34', '文章评论', '/admin/forum/article-comment', '29', 'admin/forum/article-comment', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('35', '文件夹', '/admin/folder/index', '28', 'admin/folder/index', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('36', '文件', '/admin/files/index', '28', 'admin/files/index', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('37', '举报信箱', '/admin/suggestion/suggestion-box', '27', 'admin/suggestion/suggestion-box', '1', null, null, null, null, '0', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('38', '举报信', '/admin/suggestion/suggestion-box', '37', 'admin/suggestion/suggestion-box', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('39', '举报信箱设置', '/admin/suggestion/suggestion-box/config', '37', 'admin/suggestion/suggestion-box/config', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('40', '排班记录', '/admin/schedule/work-schedule', '31', 'admin/schedule/work-schedule', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('41', '排班设置', '/admin/schedule/work-schedule/config', '31', 'admin/schedule/work-schedule/config', '1', null, '1452237268', '1', null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('42', '流程管理', '/admin/flow/meeting-room', '27', 'admin/flow/meeting-room', '1', '1452131567', '1452131790', '1', '1', '6', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('43', '更多流程', '/admin/workflow', '27', 'admin/workflow', '1', '1452146972', '1452146972', '1', '1', '7', '0', '', '0.0.0', '2');
INSERT INTO {$this->table} VALUES ('44', '菜单', '/admin/menu', '3', '/admin/menu', '1', null, null, null, null, '0', '0', '', '0.0.0', '3');
INSERT INTO {$this->table} VALUES ('45', '设置', '/admin/flow/setting', '42', 'admin/flow/setting', '1', '1452486083', '1452486117', '1', '1', '0', '0', '', '0.0.0', '3');
SQL;


    }

    public function down()
    {
        echo "m160121_072552_update_menu cannot be reverted.\n";

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
