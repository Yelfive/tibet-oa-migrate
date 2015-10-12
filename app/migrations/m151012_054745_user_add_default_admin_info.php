<?php

use yii\db\Schema;
use app\components\Migration;

class m151012_054745_user_add_default_admin_info extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = '{{%user}}';
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {
        $sql = <<<SQL
INSERT INTO {$this->table} VALUES (null,'admin', '325268c4b3a3d451939dec1f97f578f7', '', '', '', '', '', '', '', '', null, '', '', '', '', '', '', '', '', '', null, '', null, '', '', null, null, null, null, null, null, null, null, null, '1', '1444628638', '1444628638', null, null, null, '\$2y\$13\$SEO3nVWmhfgRgV3HgnPkJeZ0ZEGqTJsovLcGuZc9IguStwjeOhoEK', '', 'D3Jbv7RSzOwFGG444_Y0EhXErwDNEOf5', '', null, null, '', null, 1);
SQL;
        $this->execute($sql);

        $this->addColumn($this->table,'ethnic',"varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT '民族'");
        $this->addColumn($this->table,'birthplace',"varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT '出生地/籍贯'");
        $this->addColumn($this->table,'education',"varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT '文化程度'");
        $this->addColumn($this->table,'contact_address',"varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '文化程度'");
    }

    public function down()
    {
        echo "m151012_054745_user_add_default_admin_info cannot be reverted.\n";
        $sql = <<<SQL
        DELETE FROM {$this->table} WHERE username='admin'
SQL;
        $this->execute($sql);

        $this->dropColumn($this->table,'ethnic');
        $this->dropColumn($this->table,'birthplace');
        $this->dropColumn($this->table,'education');
        $this->dropColumn($this->table,'contact_address');

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
