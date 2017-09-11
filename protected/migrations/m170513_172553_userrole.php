<?php

class m170513_172553_userrole extends CDbMigration
{
    public function up()
    {
        $this->createTable('userrole', array(
            'id' => 'pk',
            'name' => 'varchar(255) not null',
        ));

        $this->insertMultiple('userrole', array(
            array('name' => 'Администратор'),
        ));
    }

    public function down()
    {
        $this->dropTable('userrole');
    }
}