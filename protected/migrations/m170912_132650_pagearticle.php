<?php

class m170912_132650_pagearticle extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagearticle', array(
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

        $this->insert('pagearticle', array(
            'h1_ru' => 'Статьи',
            'h1_uk' => 'Статті',
            'seo_title_ru' => 'Статьи',
            'seo_title_uk' => 'Статті',
            'seo_description_ru' => 'Статьи',
            'seo_description_uk' => 'Статті',
            'seo_keywords_ru' => 'Статьи',
            'seo_keywords_uk' => 'Статті',
        ));
    }

    public function down()
    {
        $this->dropTable('pagearticle');
    }
}