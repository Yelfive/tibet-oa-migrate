<?php

use yii\db\Schema;
use app\components\Migration;

class m151103_024512_midfy_table_engine extends Migration
{
    /**
     * Table name of which to be handled
     * @var string 
     */
    public $tables = ['{{%send_mail_log}}','{{%mail}}','{{%mail_in_folder}}','{{%mail_state}}'];

    /**
     * Field name of which to be handled
     * @var string 
     */
    public $column = '';
    
    public function up()
    {

        foreach($this->tables as $t){

            $sql = <<<SQL
            ALTER TABLE {$t}
ADD INDEX mail_id_idx (mail_id) ,
ADD INDEX created_by_idx (created_by) ;
SQL;
            $this->execute($sql);

            $sql = <<<SQL
ALTER TABLE {$t} ENGINE=InnoDB;
SQL;
          $this->execute($sql);
        }



    }

    public function down()
    {
        foreach($this->tables as $t){
            $sql = <<<SQL
ALTER TABLE {$t} ENGINE=MyISAM;
SQL;
            $this->execute($sql);
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
