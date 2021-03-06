<?php

//\usr\local\php5\php.exe www\protected\yiic migrate

class Controller extends CController
{
    public $a_chapter = array();
    public $a_chapter_1 = array();
    public $a_chapter_2 = array();
    public $a_chapter_3 = array();
    public $a_language = array();
    public $a_social = array();
    public $breadcrumbs = array();
    public $callme;
    public $layout = 'main';
    public $og_image;
    public $schedule;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $searchInfo;

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
                'actions' => array('login'),
                'users' => array('@'),
                'deniedCallback' => function () {
                    $this->redirect(array('index/index'));
                },
            ),
        );
    }

    public function init()
    {
        $this->a_language = Language::model()->findAllByAttributes(
            array('status' => 1),
            array('select' => array('code', 'name'), 'order' => '`order`')
        );
        if ($language = Yii::app()->request->getQuery('language')) {
            Yii::app()->language = $language;
        } else {
            $language = Language::model()->find(array('select' => array('code'), 'order' => '`order`'));
            Yii::app()->language = $language['code'];
        }
        $this->a_chapter = Chapter::model()->findAllByAttributes(
            array('status' => 1), array('order' => '`order` ASC')
        );
        for ($i=0, $count_chapter = count($this->a_chapter), $limit = ceil($count_chapter/3); $i<$count_chapter; $i++) {
            if ($i<$limit) {
                $this->a_chapter_1[] = $this->a_chapter[$i];
            } elseif ($i<$limit*2) {
                $this->a_chapter_2[] = $this->a_chapter[$i];
            } else {
                $this->a_chapter_3[] = $this->a_chapter[$i];
            }
        }
        $this->a_social = Social::model()->findAllByAttributes(
            array('status' => 1), array('order' => '`order` ASC')
        );
        $this->schedule = Contact::model()->findByPk(1, array('select' => 'schedule_' . Yii::app()->language));
        $this->schedule = $this->schedule['schedule_' . Yii::app()->language];
        $clientScript = Yii::app()->getClientScript();
        $clientScript->scriptMap = array(
            'jquery.js' => false,
        );
    }

    public function beforeAction($action)
    {
        if ($language = Yii::app()->request->getPost('language')) {
            Yii::app()->language = $language;
            $redirect = array($this->uniqueId . '/' . $this->action->id);
            if (Yii::app()->request->getQuery('id')) {
                $redirect['id'] = Yii::app()->request->getQuery('id');
            }
            $this->redirect($redirect);
        }
        $this->callme = new CallMe();
        if ($data = Yii::app()->request->getPost('CallMe')) {
            $this->callme->attributes = $data;
            if ($this->callme->save()) {
                $this->callme->send();
                $this->refresh();
            }
        }
        $this->searchInfo = new SearchInfo();
        return $action;
    }

    public function setSEO($model)
    {
        if ($model['seo_title_' . Yii::app()->language]) {
            $this->seo_title = $model['seo_title_' . Yii::app()->language];
        } else {
            $this->seo_title = $model['h1_' . Yii::app()->language];
        }
        if ($model['seo_description_' . Yii::app()->language]) {
            $this->seo_description = $model['seo_description_' . Yii::app()->language];
        }
        if ($model['seo_keywords_' . Yii::app()->language]) {
            $this->seo_keywords = $model['seo_keywords_' . Yii::app()->language];
        }
    }
}