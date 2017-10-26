<?php

class Forget extends CModel
{
    public $email;

    public function rules()
    {
        return array(
            array('email', 'required'),
            array('email', 'length', 'max' => 255),
            array('email', 'email'),
        );
    }

    public function attributeNames() {
        return array('email');
    }

    public function attributeLabels()
    {
        return array (
            'email' => Yii::t('models.Model', 'label-email'),
        );
    }

    public function check() {
        $o_user = User::model()->findByAttributes(array('email' => $this->email));
        if (!$o_user) {
            $this->addError('email', Yii::t('models.Model', 'error-email'));
            return false;
        }
        if (!$o_user['status']) {
            $this->addError('email', Yii::t('models.Model', 'error-active'));
            return false;
        }
        return true;
    }

    public function send()
    {
        $o_user = User::model()->findByAttributes(array('email' => $this->email, 'status' => 1));
        if ($o_user) {
            $password = substr(md5(uniqid(rand())), 0, 5);
            $o_user['password'] = $o_user->hashPassword($password);
            if ($o_user->save()) {
                $text = 'Логин - ' . $o_user['login'];
                $text .= '<br/>Пароль - ' . $password;
                $mail = new Mail();
                $mail->setTo($this->email);
                $mail->setSubject('Восстановление пароля на сайте ezmedix');
                $mail->setHtml($text);
                $mail->send();
            }
        }
    }
}