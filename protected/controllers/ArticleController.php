<?php

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $page = Yii::app()->request->getQuery('page', 1);
        $offset = ($page - 1) * News::ON_PAGE;
        $a_news = News::model()->findAllByAttributes(
            array('status' => 1, 'type_id' => News::TYPE_ARTICLE),
            array('offset' => $offset, 'limit' => News::ON_PAGE, 'order' => 'date DESC')
        );
        $count = News::model()->countByAttributes(array('status' => 1, 'type_id' => News::TYPE_ARTICLE));
        $more = false;
        if ($count > count($a_news) + $offset) {
            $more = true;
        }
        $page_total = ceil($count / News::ON_PAGE);
        $page_first = $page - 4;
        if ($page_first < 1) {
            $page_first = 1;
        }
        $page_last = $page + 4;
        if ($page_last > $page_total) {
            $page_last = $page_total;
        }
        $page_prev = $page - 1;
        if ($page_prev < 1) {
            $page_prev = 0;
        }
        $page_next = $page + 1;
        if ($page_next > $page_total) {
            $page_next = 0;
        }
        $o_page = PageArticle::model()->findByPk(1);
        $this->setSEO($o_page);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language],
        );
        $this->render('index', array(
            'a_news' => $a_news,
            'more' => $more,
            'o_page' => $o_page,
            'offset' => $offset,
            'page' => $page,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_next' => $page_next,
            'page_prev' => $page_prev,
        ));
    }

    public function actionMore()
    {
        $a_news = News::model()->findAllByAttributes(
            array('status' => 1, 'type_id' => News::TYPE_ARTICLE),
            array(
                'order' => 'date DESC',
                'offset' => Yii::app()->request->getQuery('offset', 0) + News::ON_PAGE,
                'limit' => News::ON_PAGE
            )
        );
        foreach ($a_news as $item) {
            $this->renderPartial('item', array('item' => $item));
        }
    }

    public function actionCheck()
    {
        $count = News::model()->countByAttributes(
            array('status' => 1, 'type_id' => News::TYPE_ARTICLE)
        );
        $offset = (int)Yii::app()->request->getQuery('offset', 0) + News::ON_PAGE;
        $remove = false;
        if ($count <= $offset + News::ON_PAGE) {
            $remove = true;
        }
        print CJSON::encode(array('remove' => $remove, 'offset' => $offset));
    }

    public function actionView($id)
    {
        $o_news = News::model()->findByAttributes(
            array('url' => $id, 'type_id' => News::TYPE_ARTICLE)
        );
        if (!$o_news) {
            $this->redirect(array('index'));
        }
        $text = $o_news['text_' . Yii::app()->language];
        $text = explode('</p>', $text);
        $length = 0;
        $pre = array();
        for ($i=0, $count_text=count($text); $i<$count_text; $i++) {
            $length = $length + mb_strlen($text[$i]);
            $pre[] = $text[$i];
            unset($text[$i]);
            if (560 <= $length) {
                break;
            }
        }
        $text = array_values($text);
        $pre = implode('</p>', $pre) . '</p>';
        $text = implode('</p>', $text) . '</p>';
        $o_prev = News::model()->findByAttributes(
            array('status' => 1, 'type_id' => News::TYPE_ARTICLE),
            array('condition' => 'date>' . $o_news['date'], 'order' => 'date ASC')
        );
        $o_next = News::model()->findByAttributes(
            array('status' => 1, 'type_id' => News::TYPE_ARTICLE),
            array('condition' => 'date<' . $o_news['date'], 'order' => 'date DESC')
        );
        $this->setSEO($o_news);
        $this->og_image = ImageIgosja::resize($o_news['image_id'], 560, 280);
        $o_page = PageArticle::model()->findByPk(1);
        $this->breadcrumbs = array(
            $o_page['h1_' . Yii::app()->language] => array('index'),
        );
        $this->breadcrumbs[] = $o_news['h1_' . Yii::app()->language];
        $this->render('view', array(
            'o_news' => $o_news,
            'o_next' => $o_next,
            'o_prev' => $o_prev,
            'pre' => $pre,
            'text' => $text,
        ));
    }
}