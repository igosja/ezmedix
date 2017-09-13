<?php

class m170913_174845_pagecatalog extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagecatalog', array(
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

        $this->insert('pagecatalog', array(
            'h1_ru' => 'Каталог товаров',
            'h1_uk' => 'Каталог товарів',
            'seo_title_ru' => 'Каталог товаров',
            'seo_title_uk' => 'Каталог товарів',
            'seo_description_ru' => 'Каталог товаров',
            'seo_description_uk' => 'Каталог товарів',
            'seo_keywords_ru' => 'Каталог товаров',
            'seo_keywords_uk' => 'Каталог товарів',
        ));
    }

    public function down()
    {
        $this->dropTable('pagecatalog');
    }
}