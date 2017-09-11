<?php

class m170513_172049_language extends CDbMigration
{
    public function up()
    {
        $this->createTable('language', array(
            'id' => 'pk',
            'code' => 'varchar(5) not null',
            'name' => 'varchar(255) not null',
            'order' => 'tinyint(1) default 0',
            'status' => 'tinyint(1) default 1',
        ));

        $this->insertMultiple('language', array(
            array('code' => 'uk', 'name' => 'Ua', 'order' => 0),
            array('code' => 'ru', 'name' => 'Ru', 'order' => 1),
        ));
    }

    public function down()
    {
        $this->dropTable('language');
    }
}