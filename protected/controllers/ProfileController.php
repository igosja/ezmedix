<?php

class ProfileController extends Controller
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

    public function actionIndex()
    {
        $o_user = User::model()->findByPk(Yii::app()->user->id);
        $this->seo_title = Yii::t('controllers.profile.index', 'seo-title');
        $this->seo_description = Yii::t('controllers.profile.index', 'seo-description');
        $this->seo_keywords = Yii::t('controllers.profile.index', 'seo-keywords');
        $this->breadcrumbs = array(
            Yii::t('controllers.profile.index', 'bread'),
        );
        $this->render('index', array(
            'o_user' => $o_user,
        ));
    }

    public function actionView()
    {
        $o_user = User::model()->findByPk(Yii::app()->user->id);
        $this->seo_title = Yii::t('controllers.profile.view', 'seo-title');
        $this->seo_description = Yii::t('controllers.profile.view', 'seo-description');
        $this->seo_keywords = Yii::t('controllers.profile.view', 'seo-keywords');
        $this->breadcrumbs = array(
            Yii::t('controllers.profile.index', 'bread') => array('index'),
            Yii::t('controllers.profile.view', 'bread'),
        );
        $this->render('view', array(
            'o_user' => $o_user,
        ));
    }

    public function actionUpdate()
    {
        $o_user = User::model()->findByPk(Yii::app()->user->id);
        $o_user->setScenario('edit');
        if ($data = Yii::app()->request->getPost('User')) {
            $o_user->attributes = $data;
            if ($o_user->save()) {
                $this->redirect('view');
            }
        }
        $this->seo_title = Yii::t('controllers.profile.update', 'seo-title');
        $this->seo_description = Yii::t('controllers.profile.update', 'seo-description');
        $this->seo_keywords = Yii::t('controllers.profile.update', 'seo-keywords');
        $this->breadcrumbs = array(
            Yii::t('controllers.profile.index', 'bread') => array('index'),
            Yii::t('controllers.profile.view', 'bread') => array('view'),
            Yii::t('controllers.profile.update', 'bread'),
        );
        $this->render('update', array(
            'o_user' => $o_user,
        ));
    }

    public function actionProduct()
    {
        $model = new Order();
        $count = 0;
        $price = 0;
        $o_user = User::model()->findByPk(Yii::app()->user->id);
        $model['email'] = $o_user['email'];
        $model['phone'] = $o_user['phone'];
        $a_cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
        foreach ($a_cart as $item) {
            $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
            if ($o_product) {
                $count = $count + $item['quantity'];
                $price = $price + round($o_product['price'] * (100 - $o_user['usertype']['discount']) / 100, 2) * $item['quantity'];
            } else {
                Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
            }
        }
        if ($price && $data = Yii::app()->request->getPost('Order')) {
            $model->attributes = $data;
            if ($model->save()) {
                $price = 0;
                foreach ($a_cart as $item) {
                    $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
                    if ($o_product) {
                        $o_orderproduct = new OrderProduct();
                        $o_orderproduct['category_id'] = $o_product['category_id'];
                        $o_orderproduct['category_ru'] = $o_product['category']['h1_ru'];
                        $o_orderproduct['category_uk'] = $o_product['category']['h1_uk'];
                        $o_orderproduct['discount'] = $o_user['usertype']['discount'];
                        $o_orderproduct['order_id'] = $model['id'];
                        $o_orderproduct['price'] = $o_product['price'];
                        $o_orderproduct['product_id'] = $o_product['id'];
                        $o_orderproduct['product_ru'] = $o_product['h1_ru'];
                        $o_orderproduct['product_uk'] = $o_product['h1_uk'];
                        $o_orderproduct['quantity'] = $item['quantity'];
                        $o_orderproduct['total'] = round($o_product['price'] * (100 - $o_user['usertype']['discount']) / 100, 2) * $item['quantity'];
                        $o_orderproduct->save();

                        $price = $price + $o_orderproduct['total'];
                    } else {
                        Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
                    }
                }
                $model['total'] = $price;
                $model->save();
                $model->send();;
                Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->user->id));
                $this->redirect(array('order'));
            }
        }
        $array = array();
        $a_chapter = Chapter::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        foreach ($a_chapter as $item) {
            $a_category = Category::model()->findAllByAttributes(array('chapter_id' => $item['id']));
            $category = array();
            foreach ($a_category as $cat) {
                $category[] = $cat['id'];
            }
            $a_product = Product::model()->findAllByAttributes(
                array('category_id' => $category, 'status' => 1),
                array('order' => 'category_id')
            );
            $array[] = array('chapter' => $item, 'product' => $a_product);
        }
        $a_chapter = $array;
        $this->seo_title = Yii::t('controllers.profile.product', 'seo-title');
        $this->seo_description = Yii::t('controllers.profile.product', 'seo-description');
        $this->seo_keywords = Yii::t('controllers.profile.product', 'seo-keywords');
        $this->breadcrumbs = array(
            Yii::t('controllers.profile.index', 'bread') => array('index'),
            Yii::t('controllers.profile.view', 'bread') => array('view'),
            Yii::t('controllers.profile.product', 'bread'),
        );
        $this->render('product', array(
            'a_cart' => $a_cart,
            'a_chapter' => $a_chapter,
            'count' => $count,
            'model' => $model,
            'o_user' => $o_user,
            'price' => $price,
        ));
    }

    public function actionOrder()
    {
        $a_order = Order::model()->findAllByAttributes(
            array('user_id' => Yii::app()->user->id),
            array('order' => 'id DESC')
        );
        $this->seo_title = Yii::t('controllers.profile.order', 'seo-title');
        $this->seo_description = Yii::t('controllers.profile.order', 'seo-description');
        $this->seo_keywords = Yii::t('controllers.profile.order', 'seo-keywords');
        $this->breadcrumbs = array(
            Yii::t('controllers.profile.index', 'bread') => array('index'),
            Yii::t('controllers.profile.view', 'bread') => array('view'),
            Yii::t('controllers.profile.order', 'bread'),
        );
        $this->render('order', array(
            'a_order' => $a_order,
        ));
    }
}