<?php

class m170914_175325_usertype extends CDbMigration
{
    public function up()
    {
        $this->createTable('usertype', array(
            'id' => 'pk',
            'discount' => 'decimal(5,2) default 0',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
        ));
    }

    public function down()
    {
        $this->dropTable('usertype');
    }
}