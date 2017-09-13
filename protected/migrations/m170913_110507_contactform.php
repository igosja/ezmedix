<?php

class m170913_110507_contactform extends CDbMigration
{
    public function up()
    {
        $this->createTable('feedback', array(
            'id' => 'pk',
            'clinic' => 'varchar(255)',
            'date' => 'int(11) default 0',
            'email' => 'varchar(255)',
            'name' => 'varchar(255)',
            'phone' => 'varchar(255)',
            'status' => 'int(1) default 0',
            'text' => 'text',
        ));
    }

    public function down()
    {
        $this->dropTable('feedback');
    }
}