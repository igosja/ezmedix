<?php

class User extends CActiveRecord
{
    public function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return array(
            array('address, email, name, phone', 'required', 'on' => 'update'),
            array('login, password', 'required', 'on' => 'login'),
            array('address, email, name, phone', 'required', 'on' => 'signup'),
            array('address, email, login, name, phone', 'length', 'max' => 255),
            array('email', 'email'),
            array('email', 'unique'),
            array('date, status, userrole_id, usertype_id', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'address' => Yii::t('models.User', 'label-address'),
            'date' => 'Дата регистрации',
            'email' => 'E-mail',
            'login' => Yii::t('models.User', 'label-login'),
            'name' => Yii::t('models.User', 'label-name'),
            'password' => Yii::t('models.User', 'label-password'),
            'phone' => Yii::t('models.User', 'label-phone'),
            'status' => 'Статус',
            'userrole_id' => 'Роль в системе',
            'usertype_id' => 'Тип пользователя',
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this['date'] = time();
            }
        }
        return true;
    }

    public function validatePassword($password)
    {
        return md5($password . md5('user-salt')) == $this['password'];
    }

    public function hashPassword($password)
    {
        return md5($password . md5('user-salt'));
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this['id']);
        $criteria->compare('login', $this['login'], true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function relations()
    {
        return array(
            'image' => array(self::HAS_MANY, 'UserImage', array('user_id' => 'id')),
            'userrole' => array(self::HAS_ONE, 'UserRole', array('id' => 'userrole_id')),
            'usertype' => array(self::HAS_ONE, 'UserType', array('id' => 'usertype_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}