<?php

class m170911_180431_image extends CDbMigration
{
    public function up()
    {
        $this->createTable('image', array(
            'id' => 'pk',
            'url' => 'varchar(255)',
        ));
    }

    public function down()
    {
        $this->dropTable('image');
    }
}