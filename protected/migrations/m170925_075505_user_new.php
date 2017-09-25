<?php

class m170925_075505_user_new extends CDbMigration
{
    public function up()
    {
        $this->addColumn('user', 'new', 'int(1) default 1');
    }

    public function down()
    {
        $this->dropColumn('user', 'new');
    }
}