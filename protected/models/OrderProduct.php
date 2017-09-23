<?php

class OrderProduct extends CActiveRecord
{
    public function tableName()
    {
        return 'orderproduct';
    }

    public function rules()
    {
        return array(
            array('category_id, discount, order_id, price, product_id, quantity, total', 'numerical'),
            array('category_id, discount, order_id, price, product_id, quantity, total', 'required'),
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $o_category = Category::model()->findByPk($this['category_id']);
                if (!$o_category) {
                    return false;
                }
                $o_product = Product::model()->findByPk($this['product_id']);
                if (!$o_product) {
                    return false;
                }
                $this['category_ru'] = $o_category['h1_ru'];
                $this['category_uk'] = $o_category['h1_uk'];
                $this['product_ru'] = $o_product['h1_ru'];
                $this['product_uk'] = $o_product['h1_uk'];
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'product' => array(self::HAS_ONE, 'Product', array('id' => 'product_id'), 'condition' => 'status=1'),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}