<?php

class m170912_175920_pagepartner extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagepartner', array(
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

        $this->insert('pagepartner', array(
            'h1_ru' => 'Партнёры',
            'h1_uk' => 'Партнери',
            'seo_title_ru' => 'Партнёры',
            'seo_title_uk' => 'Партнери',
            'seo_description_ru' => 'Партнёры',
            'seo_description_uk' => 'Партнери',
            'seo_keywords_ru' => 'Партнёры',
            'seo_keywords_uk' => 'Партнери',
        ));
    }

    public function down()
    {
        $this->dropTable('pagepartner');
    }
}