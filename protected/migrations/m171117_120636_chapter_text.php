<?php

class m171117_120636_chapter_text extends CDbMigration
{
    public function up()
    {
        $this->addColumn('chapter', 'text_ru', 'text AFTER status');
        $this->addColumn('chapter', 'text_uk', 'text AFTER text_ru');
        $this->addColumn('chapter', 'image_id_big', 'int(11) AFTER image_id');
    }

    public function down()
    {
        $this->dropColumn('chapter', 'text_ru');
        $this->dropColumn('chapter', 'text_uk');
        $this->dropColumn('chapter', 'image_id_big');
    }
}