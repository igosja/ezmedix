<?php

class UrlManager extends CUrlManager
{
    public function createUrl($route, $params = array(), $ampersand = '&')
    {
        if (!isset($params['language'])) {
            $params['language'] = Yii::app()->language;
        }
        if ('ru' == $params['language']) {
            unset($params['language']);
        }
        return parent::createUrl($route, $params, $ampersand);
    }
}