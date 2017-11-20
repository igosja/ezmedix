<?php

class m171120_125148_product extends CDbMigration
{
    public function up()
    {
        $this->addColumn('product', 'attention_ru', 'text');
        $this->addColumn('product', 'attention_uk', 'text');
        $this->addColumn('product', 'composition_ru', 'text');
        $this->addColumn('product', 'composition_uk', 'text');
        $this->addColumn('product', 'release_form_ru', 'text');
        $this->addColumn('product', 'release_form_uk', 'text');
        $this->addColumn('product', 'shelf_life_ru', 'text');
        $this->addColumn('product', 'shelf_life_uk', 'text');
    }

    public function down()
    {
        $this->dropColumn('product', 'attention_ru');
        $this->dropColumn('product', 'attention_uk');
        $this->dropColumn('product', 'composition_ru');
        $this->dropColumn('product', 'composition_uk');
        $this->dropColumn('product', 'release_form_ru');
        $this->dropColumn('product', 'release_form_uk');
        $this->dropColumn('product', 'shelf_life_ru');
        $this->dropColumn('product', 'shelf_life_uk');
    }
}