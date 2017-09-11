<?php

class Login extends CActiveRecord
{
    public $error_login;

    public function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('username', 'length', 'max' => 50),
            array('password', 'length', 'max' => 50),
        );
    }

    public function attributeLabels()
    {
        return array(
            'username' => 'Логин',
            'password' => 'Пароль',
        );
    }

    public function validatePassword($password)
    {
        return md5($password . md5('user-salt')) == $this->password;
    }

    public function hashPassword($password)
    {
        return md5($password . md5('user-salt'));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}