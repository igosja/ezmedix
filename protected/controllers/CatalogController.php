<?php

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $o_page = PageCatalog::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'o_page' => $o_page,
        ));
    }

    public function actionView()
    {
        $this->redirect(array('index'));
    }
}