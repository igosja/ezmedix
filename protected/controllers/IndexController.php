<?php

class IndexController extends Controller
{
    public function actionIndex()
    {
        $a_news = News::model()->findAllByAttributes(
            array('status' => 1),
            array('limit' => 3, 'order' => 'id DESC')
        );
        $this->render('index', array(
            'a_news' => $a_news,
        ));
    }
}