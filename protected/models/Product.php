<?php

class Product extends CActiveRecord
{
    const ON_PAGE = 6;

    public $filter_field;
    public $pdf_field;

    public function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, url', 'length', 'max' => 255),
            array('category_id, status, price', 'numerical'),
            array('probe_ru, probe_uk', 'url'),
            array('category_id, h1_ru, h1_uk, price', 'required'),
            array('attention_ru, attention_uk, composition_ru, composition_uk, release_form_ru, release_form_uk, shelf_life_ru, shelf_life_uk, filter_field, parameter_ru, parameter_uk, pdf_field, text_ru, text_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'attention_ru' => 'Внимание (Русский)',
            'attention_uk' => 'Внимание (Українська)',
            'category_id' => 'Категория',
            'composition_ru' => 'Состав (Русский)',
            'composition_uk' => 'Состав (Українська)',
            'filter_field' => 'Фильтры',
            'image' => 'Изображения',
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
            'parameter_ru' => 'Краткое описание (Русский)',
            'parameter_uk' => 'Краткое описание (Українська)',
            'pdf_field' => 'Инструкции',
            'price' => 'Цена, грн',
            'probe_ru' => 'Ссылка на пробник (Русский)',
            'probe_uk' => 'Ссылка на пробник (Українська)',
            'release_form_ru' => 'Форма выпуска (Русский)',
            'release_form_uk' => 'Форма выпуска (Українська)',
            'shelf_life_ru' => 'Срок годности (Русский)',
            'shelf_life_uk' => 'Срок годности (Українська)',
            'text_ru' => 'Описание (Русский)',
            'text_uk' => 'Описание (Українська)',
            'seo_title_ru' => 'SEO title (Русский)',
            'seo_title_uk' => 'SEO title (Українська)',
            'seo_description_ru' => 'SEO description (Русский)',
            'seo_description_uk' => 'SEO description (Українська)',
            'seo_keywords_ru' => 'SEO keywords (Русский)',
            'seo_keywords_uk' => 'SEO keywords (Українська)',
            'status' => 'Статус',
            'url' => 'ЧП-URL',
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $this['url'] = str_replace('/', '', $this['url']);
        }
        return true;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $a_productfilter = ProductFilter::model()->findAllByAttributes(array('product_id' => $this->primaryKey));
            foreach ($a_productfilter as $item) {
                $item->delete();
            }
            $a_productimage = ProductImage::model()->findAllByAttributes(array('product_id' => $this->primaryKey));
            foreach ($a_productimage as $item) {
                $item->delete();
            }
            $a_productpdf = ProductPdf::model()->findAllByAttributes(array('product_id' => $this->primaryKey));
            foreach ($a_productpdf as $item) {
                $item->delete();
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'category' => array(self::HAS_ONE, 'Category', array('id' => 'category_id')),
            'filter' => array(self::HAS_MANY, 'ProductFilter', array('product_id' => 'id')),
            'image' => array(self::HAS_MANY, 'ProductImage', array('product_id' => 'id'), 'order' => '`order` ASC'),
            'pdf' => array(self::HAS_MANY, 'ProductPdf', array('product_id' => 'id')),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this['id']);
        $criteria->compare('h1_ru', $this['h1_ru'], true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function searchInfo($text)
    {
        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('h1_ru', $text, true, 'OR');
        $criteria->addSearchCondition('h1_uk', $text, true, 'OR');
        $criteria->addSearchCondition('parameter_ru', $text, true, 'OR');
        $criteria->addSearchCondition('parameter_uk', $text, true, 'OR');
        $criteria->addSearchCondition('text_ru', $text, true, 'OR');
        $criteria->addSearchCondition('text_uk', $text, true, 'OR');
        $criteria->addSearchCondition('attention_ru', $text, true, 'OR');
        $criteria->addSearchCondition('attention_uk', $text, true, 'OR');
        $criteria->addSearchCondition('composition_ru', $text, true, 'OR');
        $criteria->addSearchCondition('composition_uk', $text, true, 'OR');
        $criteria->addSearchCondition('release_form_ru', $text, true, 'OR');
        $criteria->addSearchCondition('release_form_uk', $text, true, 'OR');
        $criteria->addSearchCondition('shelf_life_ru', $text, true, 'OR');
        $criteria->addSearchCondition('shelf_life_uk', $text, true, 'OR');

        return self::model()->findAll($criteria);
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}