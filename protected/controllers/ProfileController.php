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
        $o_user->setScenario('update');
        if ($data = Yii::app()->request->getPost('User')) {
            $o_user->attributes = $data;
            if ($o_user->save()) {
                $this->refresh();
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
            'a_chapter' => $a_chapter
        ));
    }
}