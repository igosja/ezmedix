<?php

class m170913_090739_pageabout extends CDbMigration
{
    public function up()
    {
        $this->createTable('pageabout', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('pageabout', array(
            'h1_ru' => 'О нас',
            'h1_uk' => 'Про нас',
            'seo_title_ru' => 'О нас',
            'seo_title_uk' => 'Про нас',
            'seo_description_ru' => 'О нас',
            'seo_description_uk' => 'Про нас',
            'seo_keywords_ru' => 'О нас',
            'seo_keywords_uk' => 'Про нас',
        ));
    }

    public function down()
    {
        $this->dropTable('pageabout');
    }
}