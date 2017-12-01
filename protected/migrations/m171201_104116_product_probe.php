<?php

class m171201_104116_product_probe extends CDbMigration
{
    public function up()
    {
        $this->addColumn('product', 'probe_ru', 'varchar(255)');
        $this->addColumn('product', 'probe_uk', 'varchar(255)');
    }

    public function down()
    {
        $this->dropColumn('product', 'probe_ru');
        $this->dropColumn('product', 'probe_uk');
    }
}