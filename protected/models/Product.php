<?php

class Product extends CActiveRecord
{
    const ON_PAGE = 6;

    public $filter_field;

    public function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk, url', 'length', 'max' => 255),
            array('category_id, status, price, pdf_id', 'numerical'),
            array('category_id, h1_ru, h1_uk, price', 'required'),
            array('filter_field, parameter_ru, parameter_uk, text_ru, text_uk, seo_description_ru, seo_description_uk, seo_keywords_ru, seo_keywords_uk', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'category_id' => 'Категория',
            'filter_field' => 'Фильтры',
            'image' => 'Изображения',
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
            'parameter_ru' => 'Параметры (Русский)',
            'parameter_uk' => 'Параметры (Українська)',
            'price' => 'Цена, грн',
            'pdf_id' => 'Инструкция',
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
            if ($this['pdf_id']) {
                $o_image = Image::model()->findByPk($this['pdf_id']);
                if ($o_image) {
                    $o_image->delete();
                }
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
            'pdf' => array(self::HAS_ONE, 'Image', array('id' => 'pdf_id')),
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

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}