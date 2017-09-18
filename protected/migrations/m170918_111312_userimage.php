<?php

class m170918_111312_userimage extends CDbMigration
{
    public function up()
    {
        $this->createTable('userimage', array(
            'id' => 'pk',
            'image_id' => 'int(11) default 0',
            'name' => 'varchar(255)',
            'user_id' => 'int(11) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('userimage');
    }
}