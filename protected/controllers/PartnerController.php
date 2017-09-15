<?php

class PartnerController extends Controller
{
    public function actionIndex()
    {
        $a_partner = Partner::model()->findAllByAttributes(
            array('status' => 1),
            array('order' => '`order` ASC')
        );
        $o_page = PagePartner::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_partner' => $a_partner,
            'o_page' => $o_page,
        ));
    }

    public function actionUpdate()
    {
        $a_partner = Partner::model()->findAllByAttributes(
            array('status' => 1),
            array('order' => '`order` ASC')
        );
        $o_page = PagePartner::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_partner' => $a_partner,
            'o_page' => $o_page,
        ));
    }
}