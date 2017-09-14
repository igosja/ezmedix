<?php

class UserType extends CActiveRecord
{
    public function tableName()
    {
        return 'usertype';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk', 'length', 'max' => 255),
            array('discount, order, status', 'numerical'),
            array('h1_ru, h1_uk, discount', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'discount' => 'Скидка, %',
            'h1_ru' => 'Название (Русский)',
            'h1_uk' => 'Название (Українська)',
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

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}