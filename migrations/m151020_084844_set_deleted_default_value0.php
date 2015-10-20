<?php

use yii\db\Schema;
use app\components\Migration;

class m151020_084844_set_deleted_default_value0 extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $table = ['{{%migration}}'];
    
    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'tibetoa'";
        $tables = \Yii::$app->db->getSchema()->getTableNames();

//        var_dump($tables);die;
        foreach($tables as $t){
            if($t != 'oa_migration'){
                $sql = <<<SQL
ALTER TABLE {$t} MODIFY COLUMN deleted  tinyint(4) NULL DEFAULT 0 COMMENT '软删除 1=已删除，0=未删除'
SQL;
                //echo $sql;
                $this->execute($sql);
            }

        }
        //return false;


    }

    public function down()
    {
        echo "m151020_084844_set_deleted_default_value0 cannot be reverted.\n";

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
