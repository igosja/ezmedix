<?php

class Category extends CActiveRecord
{
    public function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return array(
            array('h1_ru, h1_uk', 'length', 'max' => 255),
            array('chapter_id, order, status', 'numerical'),
            array('chapter_id, h1_ru, h1_uk', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'chapter_id' => 'Раздел',
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

    public function relations()
    {
        return array(
            'chapter' => array(self::HAS_ONE, 'Chapter', array('id' => 'chapter_id')),
        );
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