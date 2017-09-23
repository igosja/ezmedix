<?php

class PageAbout extends CActiveRecord
{
    public function tableName()
    {
        return 'pageabout';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, h3_ru, h3_uk, seo_title_ru, seo_title_uk', 'length', 'max' => 255),
            array('image_1_id, image_2_id, image_3_id, image_4_id', 'numerical'),
            array('text_1_ru, text_1_uk, text_2_ru, text_2_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'h3_ru' => 'Заголовок (Русский)',
            'h3_uk' => 'Заголовок (Українська)',
            'text_1_ru' => 'Текст 1 (Русский)',
            'text_1_uk' => 'Текст 1 (Українська)',
            'text_2_ru' => 'Текст 2 (Русский)',
            'text_2_uk' => 'Текст 2 (Українська)',
            'image_1_id' => 'Сертификат 1',
            'image_2_id' => 'Сертификат 2',
            'image_3_id' => 'Сертификат 3',
            'image_4_id' => 'Сертификат 4',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
        );
    }

    public function relations()
    {
        return array(
            'image_1' => array(self::HAS_ONE, 'Image', array('id' => 'image_1_id')),
            'image_2' => array(self::HAS_ONE, 'Image', array('id' => 'image_2_id')),
            'image_3' => array(self::HAS_ONE, 'Image', array('id' => 'image_3_id')),
            'image_4' => array(self::HAS_ONE, 'Image', array('id' => 'image_4_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}