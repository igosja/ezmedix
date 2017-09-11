<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $login = Login::model()->findByAttributes(array('username' => $this->username, 'userrole_id' => UserRole::ROLE_ADMIN));
        if ($login === null) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } elseif (!$login->validatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $login->id;
            $this->username = $login->username;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}