<?php

class Resize extends CActiveRecord
{
    public function tableName()
    {
        return 'resize';
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}