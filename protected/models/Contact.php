<?php

class Contact extends CActiveRecord
{
    public function tableName()
    {
        return 'contact';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, seo_title_ru, seo_title_uk', 'length', 'max' => 255),
            array('address_ru, address_uk, phone_ru, phone_uk, schedule_ru, schedule_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
            array('email, email_letter', 'email'),
            array('lat, lng', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'address_ru' => 'Адрес (Русский)',
            'address_uk' => 'Адрес (Русский)',
            'email' => 'Email',
            'email_letter' => 'Email для уведомлений',
            'h1_ru' => 'H1 (Русский)',
            'h1_uk' => 'H1 (Українська)',
            'lat' => 'Первая координата Google-карты',
            'lng' => 'Вторая координата Google-карты',
            'phone_ru' => 'Телефоны (Русский)',
            'phone_uk' => 'Телефоны (Українська)',
            'schedule_ru' => 'График работы (Русский)',
            'schedule_uk' => 'График работы (Українська)',
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