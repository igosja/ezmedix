<?php

class UserImage extends CActiveRecord
{
    public function tableName()
    {
        return 'userimage';
    }

    public function rules()
    {
        return array(
            array('name', 'length', 'max' => 255),
            array('id, image_id, user_id', 'numerical'),
        );
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if ($this['image_id']) {
                $o_image = Image::model()->findByPk($this['image_id']);
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
            'image' => array(self::HAS_ONE, 'Image', array('id' => 'image_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}