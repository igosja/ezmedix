<?php

class m170912_175930_partner extends CDbMigration
{
    public function up()
    {
        $this->createTable('partner', array(
            'id' => 'pk',
            'address_ru' => 'varchar(255)',
            'address_uk' => 'varchar(255)',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'phone_ru' => 'varchar(255)',
            'phone_uk' => 'varchar(255)',
            'status' => 'int(1) default 1',
        ));
    }

    public function down()
    {
        $this->dropTable('partner');
    }
}