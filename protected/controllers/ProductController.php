<?php

class ProductController extends Controller
{
    public function actionView($id)
    {
        $o_product = Product::model()->findByAttributes(
            array('url' => $id)
        );
        if (!$o_product) {
            $this->redirect(array('catalog/index'));
        }
        $a_product = Product::model()->findAllByAttributes(
            array('status' => 1, 'category_id' => $o_product['category_id']),
            array('condition' => 'id!=' . $o_product['id'], 'order' => 'RAND()', 'limit' => 10)
        );
        $this->setSEO($o_product);
        if (isset($o_product['image'][0])) {
            $this->og_image = ImageIgosja::resize($o_product['image'][0]['image_id'], 280, 280);
        }
        $o_page = PageCatalog::model()->findByPk(1);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language] => array('catalog/index'),
            $o_product['category']['chapter']['h1_' . Yii::app()->language] => array('catalog/view', 'id' => $o_product['category']['chapter']['url']),
        );
        $this->breadcrumbs[] = $o_product['h1_' . Yii::app()->language];
        $this->render('view', array(
            'a_product' => $a_product,
            'o_product' => $o_product,
        ));
    }
}