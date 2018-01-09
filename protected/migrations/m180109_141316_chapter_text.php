<?php

class m180109_141316_chapter_text extends CDbMigration
{
    public function up()
    {
        $this->addColumn('chapter', 'text_seo_ru', 'text AFTER status');
        $this->addColumn('chapter', 'text_seo_uk', 'text AFTER text_ru');
    }

    public function down()
    {
        $this->dropColumn('chapter', 'text_seo_ru');
        $this->dropColumn('chapter', 'text_seo_uk');
    }
}