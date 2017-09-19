<?php

class m170913_173701_category extends CDbMigration
{
    public function up()
    {
        $this->createTable('category', array(
            'id' => 'pk',
            'chapter_id' => 'int(11) default 0',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
        ));
    }

    public function down()
    {
        $this->dropTable('category');
    }
}