<?php

class CartController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'deny',
                'users' => array('?'),
            ),
        );
    }

    public function actionAdd()
    {
        $product_id = (int)Yii::app()->request->getQuery('product_id', 0);
        $quantity = (int)Yii::app()->request->getQuery('quantity', 0);
        if ($product_id && $quantity) {
            $o_cart = Cart::model()->findByAttributes(
                array('user_id' => Yii::app()->user->id, 'product_id' => $product_id)
            );
            if ($o_cart) {
                $o_cart->delete();
            } else {
                $o_cart = new Cart();
                $o_cart['product_id'] = $product_id;
                $o_cart['quantity'] = $quantity;
                $o_cart->save();
            }
        }
        $price = 0;
        $count = 0;
        $o_user = User::model()->findByPk(Yii::app()->user->id);
        $a_cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
        foreach ($a_cart as $item) {
            $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
            if ($o_product) {
                $price = $price + round($o_product['price'] * (100 - $o_user['usertype']['discount']) / 100, 2) * $item['quantity'];
                $count = $count + $item['quantity'];
            } else {
                Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
            }
        }
        print CJSON::encode(array(
            'status' => 'success',
            'count' => $count,
            'price' => Yii::app()->numberFormatter->formatDecimal($price),
            'table' => $this->renderPartial('/profile/cart', array('a_cart' => $a_cart, 'o_user' => $o_user), true)
        ));
    }
}