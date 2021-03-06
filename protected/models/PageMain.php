<?php

class PageMain extends CActiveRecord
{
    public function tableName()
    {
        return 'pagemain';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, seo_title_ru, seo_title_uk', 'length', 'max' => 255),
            array('text_1_ru, text_1_uk, text_2_ru, text_2_uk, text_3_ru, text_3_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'text_1_ru' => 'Текст 1 (Русский)',
            'text_1_uk' => 'Текст 1 (Українська)',
            'text_2_ru' => 'Текст 2 (Русский)',
            'text_2_uk' => 'Текст 2 (Українська)',
            'text_3_ru' => 'Текст 3 (Русский)',
            'text_3_uk' => 'Текст 3 (Українська)',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}