<?php

class m170513_172547_user extends CDbMigration
{
    public function up()
    {
        $this->createTable('user', array(
            'id' => 'pk',
            'username' => 'varchar(255) not null',
            'password' => 'varchar(32) not null',
            'userrole_id' => 'tinyint(1) default 3',
        ));

        $this->insert('user', array(
            'username' => 'admin',
            'password' => '3679163934587a4abafd80a44d0e318a',
            'userrole_id' => '1',
        ));

        $this->insert('user', array(
            'username' => 'igosja',
            'password' => '76dbc4e726a15737c82940e1109b2aa7',
            'userrole_id' => '1',
        ));
    }

    public function down()
    {
        $this->dropTable('user');
    }
}