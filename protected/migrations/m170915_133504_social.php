<?php

class m170915_133504_social extends CDbMigration
{
    public function up()
    {
        $this->createTable('social', array(
            'id' => 'pk',
            'css' => 'varchar(255)',
            'name' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
            'url' => 'varchar(255)',
        ));

        $this->insertMultiple('social', array(
            array(
                'css' => 'facebook-btn',
                'name' => 'Facebook',
            ),
            array(
                'css' => 'twitter-btn',
                'name' => 'Twitter',
                'order' => 1,
            ),
        ));
    }

    public function down()
    {
        $this->dropTable('social');
    }
}