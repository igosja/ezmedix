<?php

class PageaboutController extends AController
{
    public $h1 = 'О нас';
    public $h1_edit = 'О нас';
    public $title_index = 'О нас';
    public $title_update = 'Редактирование';
    public $model_name = 'PageAbout';

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
                $this->uploadImage(1);
                Yii::app()->user->setFlash('success', $this->saved);
                $this->redirect(array('index'));
            }
        }
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
            $this->title_update
        );
        $this->render('form', array('model' => $model));
    }

    public function actionImage($id)
    {
        $o_image = Image::model()->findByPk($id);
        if ($o_image) {
            $o_image->delete();
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(array('update'));
    }

    public function uploadImage($id)
    {
        if (isset($_FILES['image_1']['name']) && !empty($_FILES['image_1']['name'])) {
            $image = $_FILES['image_1'];
            $ext = $image['name'];
            $ext = explode('.', $ext);
            $ext = end($ext);
            $file = $image['tmp_name'];
            $image_url = ImageIgosja::put_file($file, $ext);
            $o_image = new Image();
            $o_image['url'] = $image_url;
            $o_image->save();
            $image_id = $o_image->primaryKey;
            $model = $this->getModel()->findByPk($id);
            $model['image_1_id'] = $image_id;
            $model->save();
        }
        if (isset($_FILES['image_2']['name']) && !empty($_FILES['image_2']['name'])) {
            $image = $_FILES['image_2'];
            $ext = $image['name'];
            $ext = explode('.', $ext);
            $ext = end($ext);
            $file = $image['tmp_name'];
            $image_url = ImageIgosja::put_file($file, $ext);
            $o_image = new Image();
            $o_image['url'] = $image_url;
            $o_image->save();
            $image_id = $o_image->primaryKey;
            $model = $this->getModel()->findByPk($id);
            $model['image_2_id'] = $image_id;
            $model->save();
        }
        if (isset($_FILES['image_3']['name']) && !empty($_FILES['image_3']['name'])) {
            $image = $_FILES['image_3'];
            $ext = $image['name'];
            $ext = explode('.', $ext);
            $ext = end($ext);
            $file = $image['tmp_name'];
            $image_url = ImageIgosja::put_file($file, $ext);
            $o_image = new Image();
            $o_image['url'] = $image_url;
            $o_image->save();
            $image_id = $o_image->primaryKey;
            $model = $this->getModel()->findByPk($id);
            $model['image_3_id'] = $image_id;
            $model->save();
        }
        if (isset($_FILES['image_4']['name']) && !empty($_FILES['image_4']['name'])) {
            $image = $_FILES['image_4'];
            $ext = $image['name'];
            $ext = explode('.', $ext);
            $ext = end($ext);
            $file = $image['tmp_name'];
            $image_url = ImageIgosja::put_file($file, $ext);
            $o_image = new Image();
            $o_image['url'] = $image_url;
            $o_image->save();
            $image_id = $o_image->primaryKey;
            $model = $this->getModel()->findByPk($id);
            $model['image_4_id'] = $image_id;
            $model->save();
        }
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