<?php

class SearchController extends Controller
{
    public function actionIndex()
    {
        $model = new SearchInfo();
        if ($data = Yii::app()->request->getQuery('SearchInfo')) {
            $model->attributes = $data;
            if ($model->q) {
                $a_chapter = Chapter::model()->searchInfo($model->q);
                $a_news = News::model()->searchInfo($model->q);
                $a_product = Product::model()->searchInfo($model->q);
                $o_page = array(
                    'h1_ru' => Yii::t('views.search.index', 'h1'),
                    'h1_uk' => Yii::t('views.search.index', 'h1'),
                    'seo_title_ru' => Yii::t('views.search.index', 'title'),
                    'seo_title_uk' => Yii::t('views.search.index', 'title'),
                    'seo_description_ru' => Yii::t('views.search.index', 'description'),
                    'seo_description_uk' => Yii::t('views.search.index', 'description'),
                    'seo_keywords_ru' => Yii::t('views.search.index', 'keywords'),
                    'seo_keywords_uk' => Yii::t('views.search.index', 'keywords'),
                );
                $this->setSEO($o_page);
                $this->breadcrumbs[] = $o_page['h1_' . Yii::app()->language];
                $this->render('index', array(
                    'a_chapter' => $a_chapter,
                    'a_news' => $a_news,
                    'a_product' => $a_product,
                    'o_page' => $o_page,
                ));
            } else {
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        } else {
            $this->redirect(Yii::app()->request->urlReferrer);
        }
    }
}