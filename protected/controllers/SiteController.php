<?php

class SiteController extends Controller
{
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
                    $this->redirect(array('profile/index'));
                } else {
                    $model->addError('password', Yii::t('controllers.site.login', 'error-password'));
                }
            }
        }
        $this->render('login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('site/login'));
    }
}