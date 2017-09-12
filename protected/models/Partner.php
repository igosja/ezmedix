<?php

class Partner extends CActiveRecord
{
    public function tableName()
    {
        return 'partner';
    }

    public function rules()
    {
        return array(
            array('address_ru, address_uk, h1_ru, h1_uk, phone_ru, phone_uk', 'length', 'max' => 255),
            array('order, status', 'numerical'),
            array('address_ru, address_uk, h1_ru, h1_uk, phone_ru, phone_uk', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'address_ru' => 'Адрес (Русский)',
            'address_uk' => 'Адрес (Українська)',
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
            'phone_ru' => 'Телефоны (Русский)',
            'phone_uk' => 'Телефоны (Українська)',
            'status' => 'Статус',
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $last = self::model()->findByAttributes(array('order' => '`order` DESC'));
                if ($last) {
                    $order = $last['order'] + 1;
                } else {
                    $order = 0;
                }
                $this['order'] = $order;
            }
        }
        return true;
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function relations()
    {
        return array(
            'image' => array(self::HAS_ONE, 'Image', array('id' => 'image_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}