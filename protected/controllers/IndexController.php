<?php

class IndexController extends Controller
{
    public function actionIndex()
    {
        $a_news = News::model()->findAllByAttributes(
            array('status' => 1, 'type_id' => News::TYPE_NEWS),
            array('limit' => 3, 'order' => 'id DESC')
        );
        $a_slide = Slide::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $o_page = PageMain::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_news' => $a_news,
            'a_slide' => $a_slide,
            'o_page' => $o_page,
        ));
    }
}