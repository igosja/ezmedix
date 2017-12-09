<?php

return array(
    'defaultController' => 'index',
    'language' => 'ru',
    'sourceLanguage' => 'ru',
    'timeZone' => 'UTC',
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        'urlManager' => array(
            'class' => 'application.components.UrlManager',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<language:(ru|uk)>' => 'index/index',
                '<language:(ru|uk)>/about' => 'about/index',
                '<language:(ru|uk)>/auth' => 'site/auth',
                '<language:(ru|uk)>/article/<id>' => 'article/view',
                '<language:(ru|uk)>/article' => 'article/index',
                '<language:(ru|uk)>/catalog/<id>' => 'catalog/index',
                '<language:(ru|uk)>/catalog' => 'catalog/index',
                '<language:(ru|uk)>/contact' => 'contact/index',
                '<language:(ru|uk)>/forget' => 'site/forget',
                '<language:(ru|uk)>/login' => 'site/login',
                '<language:(ru|uk)>/news/<id>' => 'news/view',
                '<language:(ru|uk)>/news' => 'news/index',
                '<language:(ru|uk)>/partner' => 'partner/index',
                '<language:(ru|uk)>/profile' => 'profile/index',
                '<language:(ru|uk)>/product/<id>' => 'product/view',
                '<language:(ru|uk)>/signup' => 'site/signup',
                '' => 'index/index',
                'about' => 'about/index',
                'auth' => 'site/auth',
                'article/check' => 'article/check',
                'article/more' => 'article/more',
                'article/<id>' => 'article/view',
                'article' => 'article/index',
                'catalog/check' => 'catalog/check',
                'catalog/more' => 'catalog/more',
                'catalog/<id>' => 'catalog/index',
                'catalog' => 'catalog/index',
                'contact' => 'contact/index',
                'forget' => 'site/forget',
                'login' => 'site/login',
                'news/check' => 'news/check',
                'news/more' => 'news/more',
                'news/<id>' => 'news/view',
                'news' => 'news/index',
                'partner' => 'partner/index',
                'profile' => 'profile/index',
                'product/<id>' => 'product/view',
                'search' => 'search/index',
                'signup' => 'site/signup',
                '<language:(ru|uk)>/<controller>/<action>/<id>' => '<controller>/<action>',
                '<language:(ru|uk)>/<controller>/<action>' => '<controller>/<action>',
                '<language:(ru|uk)>/<controller>' => '<controller>/index',
                '<module:(admin)>/<language:(ru|uk)>/<controller>/<action>/<id>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<language:(ru|uk)>/<controller>/<action>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<language:(ru|uk)>/<controller>' => '<module>/<controller>',
                '<module:(admin)>/<language:(ru|uk)>' => '<module>/index',
                '<module:(admin)>/<controller>/<action>/<id>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<controller>/<action>' => '<module>/<controller>/<action>',
                '<module:(admin)>/<controller>' => '<module>/<controller>',
                '<module:(admin)>' => '<module>/index',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=igosja_ezmedix',
            'emulatePrepare' => true,
            'username' => 'igosja_ezmedix',
            'password' => '[ZaYF*Za',
            'charset' => 'utf8',
        ),
        'messages' => array(
            'class' => 'CDbMessageSource',
            'cacheID' => 'cache',
            'cachingDuration' => 43200,
            'connectionID' => 'db',
            'sourceMessageTable' => 'i18n_source_messages',
            'translatedMessageTable' => 'i18n_translated_messages',
            'forceTranslation' => true,
        ),
        'user' => array(
            'loginUrl' => array('site/auth'),
        ),
    ),
    'modules' => array(
        'admin',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
        ),
    ),
);