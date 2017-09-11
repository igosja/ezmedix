<?php

class SiteController extends Controller
{
    public function actionLogin()
    {
        $model = new Login;
        if ($data = Yii::app()->request->getPost('Login')) {
            $username = $data['username'];
            $password = $data['password'];
            $identity = new UserIdentity($username, $password);
            if ($identity->authenticate()) {
                Yii::app()->user->login($identity);
                $this->redirect(array('admin/index'));
            } else {
                $model->error_login = 'Неправильная комбинация<br/>логин/пароль';
            }
        }
        $this->layout = 'login';
        $this->render('login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('site/login'));
    }
}