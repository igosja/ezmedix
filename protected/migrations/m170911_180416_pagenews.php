<?php

class m170911_180416_pagenews extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagenews', array(
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

        $this->insert('pagenews', array(
            'h1_ru' => 'Новости',
            'h1_uk' => 'Новини',
            'seo_title_ru' => 'Новости',
            'seo_title_uk' => 'Новини',
            'seo_description_ru' => 'Новости',
            'seo_description_uk' => 'Новини',
            'seo_keywords_ru' => 'Новости',
            'seo_keywords_uk' => 'Новини',
        ));
    }

    public function down()
    {
        $this->dropTable('pagenews');
    }
}