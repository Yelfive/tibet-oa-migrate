<?php

use yii\db\Schema;
use app\components\Migration;

class m151127_034019_create_tables extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $article = '{{%article}}';
    public $forum = '{{%forum}}';
    public $forum_board = '{{%forum_board}}';
    public $article_comment = '{{%article_comment}}';

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $tables = <<<SQL
CREATE TABLE {$this->article} (
article_id  int NOT NULL AUTO_INCREMENT COMMENT '文章编号' ,
title  varchar(255) NOT NULL COMMENT '文章标题' ,
content  text NOT NULL COMMENT '文章内容' ,
attachment  text NULL COMMENT '文章附件' ,
article_type  tinyint NULL DEFAULT 1 COMMENT '文章类型1=论坛文章，2=动态新闻' ,
from_fullname  varchar(255) NOT NULL COMMENT '创建人姓名' ,
from_user_sex  tinyint NULL DEFAULT 1 COMMENT '1=男，2=女' ,
top_order  int NOT NULL DEFAULT 0 COMMENT '置顶的顺序，值越大置顶排在越前面' ,
board_id  int NOT NULL DEFAULT 0 COMMENT '论坛板块ID' ,
view_count  int(11) NULL DEFAULT 0 COMMENT '查看次数' ,
comment_count  int NULL DEFAULT 0 COMMENT '评论数量' ,
created_at  int NULL COMMENT '创建时间' ,
created_by  int NULL COMMENT '创建人' ,
updated_at  int NULL COMMENT '更新时间' ,
updated_by  int NULL COMMENT '更新人' ,
deleted  tinyint NULL DEFAULT 0 COMMENT '1=软删除，0=未删除' ,
PRIMARY KEY (article_id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
;

CREATE TABLE IF NOT EXISTS {$this->forum} (
  forum_id int NOT NULL AUTO_INCREMENT COMMENT '论坛编号',
  forum_name VARCHAR(255) NOT NULL COMMENT '论坛名称',
  forum_desc text NOT NULL COMMENT '论坛简介',
  forum_url VARCHAR(255) NOT NULL COMMENT '论坛地址',
  forum_icon VARCHAR(255) NULL COMMENT '论坛图标',
  created_at  int NULL COMMENT '创建时间' ,
  created_by  int NULL COMMENT '创建人' ,
  updated_at  int NULL COMMENT '更新时间' ,
  updated_by  int NULL COMMENT '更新人' ,
  deleted  tinyint NULL DEFAULT 0 COMMENT '1=软删除，0=未删除' ,
  PRIMARY KEY (forum_id),
  KEY created_by (created_by)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000 ;


CREATE TABLE {$this->forum_board} (
  board_id int(11) NOT NULL AUTO_INCREMENT COMMENT '板块编号',
  parent_id int(11) NULL DEFAULT 0 COMMENT '父板块编号',
  board_name VARCHAR(255) NOT NULL COMMENT '板块名称',
  board_desc VARCHAR(255) NOT NULL COMMENT '板块介绍',
  forum_id int(11) NOT NULL DEFAULT 0 COMMENT '论坛ID',
  owner_id int(11) NOT NULL COMMENT '版主用户ID',
  columns tinyint(4) NOT NULL DEFAULT '1' COMMENT '板块显示列数' ,
  created_at  int NULL COMMENT '创建时间' ,
  created_by  int NULL COMMENT '创建人' ,
  updated_at  int NULL COMMENT '更新时间' ,
  updated_by  int NULL COMMENT '更新人' ,
  deleted  tinyint NULL DEFAULT 0 COMMENT '1=软删除，0=未删除' ,
  PRIMARY KEY (board_id),
  KEY forum_id (forum_id),
  KEY owner_id (owner_id),
  KEY created_by (created_by)
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;


CREATE TABLE {$this->article_comment} (
  comment_id int(11) NOT NULL AUTO_INCREMENT COMMENT '评论编号',
  content text NOT NULL COMMENT '评论内容',
  article_id int(11) NOT NULL COMMENT '文章编号',
  parent_id int(11) NULL DEFAULT 0 COMMENT '父评论编号',
  from_fullname  varchar(255) NOT NULL COMMENT '创建人姓名' ,
  from_user_sex  tinyint NULL DEFAULT 1 COMMENT '1=男，2=女' ,
  created_at  int NULL COMMENT '创建时间' ,
  created_by  int NULL COMMENT '创建人' ,
  updated_at  int NULL COMMENT '更新时间' ,
  updated_by  int NULL COMMENT '更新人' ,
  deleted  tinyint NULL DEFAULT 0 COMMENT '1=软删除，0=未删除' ,
  PRIMARY KEY (comment_id),
  KEY created_by (created_by),
  KEY article_id (article_id),
  KEY parent_id (parent_id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
SQL;
        $this->execute($tables);

    }

    public function down()
    {
        $this->dropTable($this->article);
        $this->dropTable($this->article_comment);
        $this->dropTable($this->forum_board);
        $this->dropTable($this->forum);
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
