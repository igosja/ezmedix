<?php

class PagenewsController extends AController
{
    public $h1 = 'Новости (СЕО)';
    public $h1_edit = 'Новости (СЕО)';
    public $title_index = 'Новости (СЕО)';
    public $title_update = 'Редактирование';
    public $model_name = 'PageNews';

    public function actionIndex()
    {
        $model = $this->getModel()->findByPk(1);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        $this->breadcrumbs = array(
            $this->title_index,
        );
        $this->render('index', array('model' => $model));
    }

    public function actionUpdate()
    {
        $this->h1 = $this->h1_edit;
        $model = $this->getModel()->findByPk(1);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        if ($data = Yii::app()->request->getPost($this->model_name)) {
            $model->attributes = $data;
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
            $this->title_update
        );
        $this->render('form', array('model' => $model));
    }

    /**
     * @param $search string
     * @return CActiveRecord
     */
    public function getModel($search = '')
    {
        $model = new $this->model_name($search);
        return $model;
    }
}