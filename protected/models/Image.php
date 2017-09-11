<?php

class Image extends CActiveRecord
{
    public function tableName()
    {
        return 'image';
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $a_resize = Resize::model()->findAllByAttributes(array('image_id' => $this->id));
            foreach ($a_resize as $item) {
                if (isset($item->url)) {
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $item->url)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . $item->url);
                    }
                    $item->delete();
                }
            }
        }
        return true;
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}