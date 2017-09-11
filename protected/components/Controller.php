<?php

//\usr\local\php5\php.exe www\protected\yiic migrate

class Controller extends CController
{
    public $a_category = array();
    public $a_language = array();
    public $breadcrumbs = array();
    public $callme;
    public $order;
    public $contact;
    public $layout = 'main';
    public $og_image;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;

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
        $this->a_category = Category::model()->getTreeMenu();
        $this->contact = Contact::model()->findByAttributes(
            array('id' => 1),
            array('select' => array(
                'address_head_' . Yii::app()->language,
                'hours_monday',
                'hours_saturday',
                'phone_kyivstar',
                'phone_life',
                'phone_umc',
            ))
        );
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
            $this->callme->date = time();
            if ($this->callme->save()) {
                $this->callme->send();
                $this->refresh();
            }
        }
        $this->order = new Order();
        if ($data = Yii::app()->request->getPost('Order')) {
            $this->order->attributes = $data;
            $this->order->date = time();
            if ($this->order->save()) {
                $this->order->send();
                $this->refresh();
            }
        }
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