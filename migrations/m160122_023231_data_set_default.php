<?php

use yii\db\Schema;
use app\components\Migration;

class m160122_023231_data_set_default extends Migration
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
ALTER TABLE {$this->table}
MODIFY COLUMN political_status  tinyint(4) NULL DEFAULT 0 COMMENT '政治面貌：0未指定，1党员，2预备党员，3.团员，4群众，5其他党派人士' AFTER heartbeat_time;
SQL;
        $this->execute($sql);

//        var_dump(Yii::$app->params);die;
        $dir = '';
        if(strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
//            $dir = Yii::$app->params['WindowsDataCacheDir'];
//            $dir = str_replace('/','\\',$dir);
//            $str = "rd /S/Q " . $dir;
        } else {
            $dir = '/data/www/oa/app/data/cache';
            $str = "rm -rf " . $dir;
        }
        if(is_dir($dir)){
            exec($str);
        }

    }

    public function down()
    {
        echo "m160122_023231_data_set_default cannot be reverted.\n";

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
