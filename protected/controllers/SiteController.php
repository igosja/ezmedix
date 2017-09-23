<?php

class SiteController extends Controller
{
    public function actionAuth()
    {
        $this->render('auth');
    }

    public function actionLogin()
    {
        $model = new User;
        $model->setScenario('login');
        if ($data = Yii::app()->request->getPost('User')) {
            $model->attributes = $data;
            if ($model->validate()) {
                $identity = new UserIdentity($model['login'], $model['password']);
                if ($identity->authenticate()) {
                    Yii::app()->user->login($identity);
                    $this->redirect(Yii::app()->user->returnUrl);
                } else {
                    $model->addError('password', Yii::t('controllers.site.login', 'error-password'));
                }
            }
        }
        $this->render('login', array('model' => $model));
    }

    public function actionSignup()
    {
        $a_usertype = UserType::model()->findAllByAttributes(array('status' => 1), array('order' => '`order` ASC'));
        $model = new User;
        $model->setScenario('signup');
        if ($data = Yii::app()->request->getPost('User')) {
            $model->attributes = $data;
            if ($model->save()) {
                $this->uploadImage($model->primaryKey);
                $this->refresh();
            }
        }
        $this->render('signup', array('model' => $model, 'a_usertype' => $a_usertype));
    }

    public function actionForget()
    {
        $model = new Forget();
        if ($data = Yii::app()->request->getPost('Forget')) {
            $model->attributes = $data;
            if ($model->validate() && $model->check()) {
                $model->send();
                $this->redirect(array('profile/index'));
            }
        }
        $this->render('forget', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('index/index'));
    }

    public function uploadImage($id)
    {
        if (isset($_FILES['image']['name'][0]) && !empty($_FILES['image']['name'][0])) {
            $image = $_FILES['image'];
            $remove = $_POST['image-remove'];
            $remove = explode(',', $remove);
            for ($i = 0; $i < count($image['name']); $i++) {
                if (!in_array($i, $remove)) {
                    $ext = $image['name'][$i];
                    $ext = explode('.', $ext);
                    $ext = end($ext);
                    $file = $image['tmp_name'][$i];
                    $image_url = ImageIgosja::put_file($file, $ext);
                    $o_image = new Image();
                    $o_image->url = $image_url;
                    $o_image->save();
                    $image_id = $o_image->primaryKey;
                    $model = new UserImage();
                    $model['image_id'] = $image_id;
                    $model['name'] = $image['name'][$i];
                    $model['user_id'] = $id;
                    $model->save();
                }
            }
        }
    }
}