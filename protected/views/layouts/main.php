<?php
/**
 * @var $form    CActiveForm
 * @var $content string
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js homepage"> <!--<![endif]-->
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $this->seo_title; ?></title>
    <meta name="description" content="<?= $this->seo_description; ?>">
    <meta name="keywords" content="<?= $this->seo_keywords; ?>">
    <meta property="og:title" content="<?= $this->seo_title; ?>"/>
    <meta property="og:description" content="<?= $this->seo_description; ?>"/>
    <meta property="og:type" content="text"/>
    <meta property="og:image" content="http://<?= $_SERVER['HTTP_HOST'] . $this->og_image; ?>"/>
    <meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
    <meta http-equiv="content-language" content="<?= Yii::app()->language; ?>"/>
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i,800&amp;subset=cyrillic" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/css/normalize.min.css?v=<?= filemtime(__DIR__ . '/../../../css/normalize.min.css'); ?>">
    <link rel="stylesheet" href="/css/libs.css?v=<?= filemtime(__DIR__ . '/../../../css/libs.css'); ?>">
    <link rel="stylesheet" href="/css/main.css?v=<?= filemtime(__DIR__ . '/../../../css/main.css'); ?>">
    <link rel="stylesheet" href="http://inpinto.ru/test/ezmedix/css/main.css">
    <link rel="stylesheet" href="/css/mobile.css?v=<?= filemtime(__DIR__ . '/../../../css/main.css'); ?>">
    <link rel="stylesheet" href="/css/site.css?v=<?= filemtime(__DIR__ . '/../../../css/site.css'); ?>">
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">
    You are using an <strong>outdated</strong> browser.
    Please <a target="_blank" rel="nofollow" href="http://browsehappy.com/">upgrade your browser</a>
    to improve your experience.
</p>
<![endif]-->
<div class="sitewrap">
    <header class="header">
        <div class="wrap clearfix">
            <div class="header__logo">
                <?= CHtml::link('<img src="/img/logo.png" alt="Ezmedix">', array('index/index')); ?>
            </div>
            <div class="header__info clearfix">
                <?php foreach ($this->a_social as $item) { ?>
                    <a href="<?= $item['url'] ? $item['url'] : 'javascript:'; ?>" class="<?= $item['css']; ?>"
                       target="_blank"></a>
                <?php } ?>
                <?php if (Yii::app()->user->isGuest) {
                    $profile_link = Yii::t('views.layouts.main', 'header-link-login');
                } else {
                    $profile_link = Yii::t('views.layouts.main', 'header-link-profile');
                } ?>
                <?= CHtml::link(
                    Yii::t('views.layouts.main', 'header-link-profile'),
                    array('profile/index'),
                    array('class' => 'header__log-in')
                ); ?>
                <div class="lang-select">
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => true,
                        'htmlOptions' => array('class' => 'lang-select'),
                    )); ?>
                    <?= CHtml::dropDownList(
                        'language',
                        Yii::app()->language,
                        CHtml::listData($this->a_language, 'code', 'name'),
                        array('id' => 'language-select')
                    ); ?>
                    <?php $this->endWidget(); ?>
                </div>
                <a href="javascript:" class="show-m-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="header__search clearfix">
                <form action="/" onsubmit="return false">
                    <input type="submit" class="header__search__subm" value="">
                    <input type="text" class="header__search__text">
                </form>
            </div>
        </div>
    </header>
    <nav class="nav">
        <div class="wrap">
            <ul>
                <li>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-about'),
                        array('about/index')
                    ); ?>
                </li>
                <li class="nav-h">
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-catalog'),
                        array('catalog/index'),
                        array('class' => 'nav__arrow')
                    ); ?>
                    <div class="nav__drop">
                        <div class="wrap clearfix">
                            <div class="nav__drop__i">
                                <?php foreach ($this->a_chapter_1 as $item) { ?>
                                    <?= CHtml::link(
                                        '<img src="' . $item['image']['url'] . '" alt="'
                                        . $item['h1_' . Yii::app()->language]
                                        . '">'
                                        . $item['h1_' . Yii::app()->language],
                                        array('catalog/index', 'id' => $item['url']),
                                        array('class' => 'nav__drop__link')
                                    ); ?>
                                <?php } ?>
                            </div>
                            <div class="nav__drop__i">
                                <?php foreach ($this->a_chapter_2 as $item) { ?>
                                    <?= CHtml::link(
                                        '<img src="' . $item['image']['url'] . '" alt="'
                                        . $item['h1_' . Yii::app()->language]
                                        . '">'
                                        . $item['h1_' . Yii::app()->language],
                                        array('catalog/index', 'id' => $item['url']),
                                        array('class' => 'nav__drop__link')
                                    ); ?>
                                <?php } ?>
                            </div>
                            <div class="nav__drop__i">
                                <?php foreach ($this->a_chapter_3 as $item) { ?>
                                    <?= CHtml::link(
                                        '<img src="' . $item['image']['url'] . '" alt="'
                                        . $item['h1_' . Yii::app()->language]
                                        . '">'
                                        . $item['h1_' . Yii::app()->language],
                                        array('catalog/index', 'id' => $item['url']),
                                        array('class' => 'nav__drop__link')
                                    ); ?>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="javascript:" class="menu-close menu-close_2"></a>
                    </div>
                </li>
                <li>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-partner'),
                        array('partner/index')
                    ); ?>
                </li>
                <li>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-news'),
                        array('news/index')
                    ); ?>
                </li>
                <li>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-article'),
                        array('article/index')
                    ); ?>
                </li>
                <li>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-contact'),
                        array('contact/index')
                    ); ?>
                </li>
            </ul>
            <div class="header__search clearfix">
                <form action="">
                    <input type="submit" class="header__search__subm" value="">
                    <input type="text" class="header__search__text">
                </form>
            </div>
            <?php foreach ($this->a_social as $item) { ?>
                <a href="<?= $item['url'] ? $item['url'] : 'javascript:'; ?>" class="<?= $item['css']; ?>" target="_blank"></a>
            <?php } ?>
            <a href="javascript:" data-selector="form-call" class="nav-btn overlayElementTrigger">
                <?= Yii::t('views.layouts.main', 'header-link-ask'); ?>
            </a>
            <a href="javascript:" class="menu-close menu-close_1"></a>
        </div>
    </nav>
    <?= $content; ?>
    <div class="clearfix-footer"></div>
</div>
<footer>
    <div class="footer-top">
        <div class="wrap">
            <div class="footer-top__f clearfix">
                <div class="footer-top__f__menu">
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-about'),
                        array('about/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-catalog'),
                        array('catalog/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-partner'),
                        array('partner/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-news'),
                        array('news/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-article'),
                        array('article/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-contact'),
                        array('contact/index')
                    ); ?>
                </div>
                <div class="footer-top__f__info">
                    <?php foreach ($this->a_social as $item) { ?>
                        <a href="<?= $item['url'] ? $item['url'] : 'javascript:'; ?>" class="<?= $item['css']; ?>" target="_blank"></a>
                    <?php } ?>
                    <a href="javascript:" data-selector="form-call" class="footer-btn overlayElementTrigger">
                        <?= Yii::t('views.layouts.main', 'footer-link-ask'); ?>
                    </a>
                </div>
            </div>
            <div class="footer-top__s clearfix">
                <div class="footer-top__s__i">
                    <ul>
                        <?php foreach ($this->a_chapter_1 as $item) { ?>
                            <li>
                                <?= CHtml::link(
                                    $item['h1_' . Yii::app()->language],
                                    array('catalog/index', 'id' => $item['url'])
                                ); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-top__s__i">
                    <ul>
                        <?php foreach ($this->a_chapter_2 as $item) { ?>
                            <li>
                                <?= CHtml::link(
                                    $item['h1_' . Yii::app()->language],
                                    array('catalog/index', 'id' => $item['url'])
                                ); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-top__s__i">
                    <ul>
                        <?php foreach ($this->a_chapter_3 as $item) { ?>
                            <li>
                                <?= CHtml::link(
                                    $item['h1_' . Yii::app()->language],
                                    array('catalog/index', 'id' => $item['url'])
                                ); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-top__s__i">
                    <div class="footer-top__grafik">
                        <strong><?= Yii::t('views.layouts.main', 'schedule'); ?></strong>
                        <?= $this->schedule; ?>
                    </div>
                    <div class="header__search clearfix">
                        <form action="/" onsubmit="return false">
                            <input type="submit" class="header__search__subm" value="">
                            <input type="text" class="header__search__text">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap clearfix">
            <div class="footer-copyright">
                <img src="/img/footer-logo.png" alt="Ezmedix">
                EZMEDIX © 2008—<?= date('Y'); ?> <?= Yii::t('views.layouts.main', 'reserved'); ?>
            </div>
            <div class="footer-frog">
                <a href="javascript:">
                    <?= Yii::t('views.layouts.main', 'developer'); ?>
                    <img src="/img/frog.png" alt="Gabbe">
                </a>
            </div>
        </div>
    </div>
</footer>
<section class="overlay-forms">
    <div class="form-overlay"></div>
    <div class="wrap">
        <div class="of-form form-call">
            <a href="javascript:" class="of-close"></a>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'id' => 'popup-contact-form'
            )); ?>
            <div class="of-form__title"><?= Yii::t('views.layouts.main', 'form-ask-title'); ?></div>
            <div class="of-wrap clearfix">
                <?= $form->textField($this->callme, 'name', array(
                    'class' => 'of-input of-input_name',
                    'placeholder' => Yii::t('views.layouts.main', 'placeholder-name')
                )); ?>
                <?= $form->error($this->callme, 'name'); ?>
                <?= $form->textField($this->callme, 'phone', array(
                    'class' => 'of-input of-input_phone phone_mask',
                    'placeholder' => Yii::t('views.layouts.main', 'placeholder-phone')
                )); ?>
                <?= $form->error($this->callme, 'phone'); ?>
                <?= $form->textField($this->callme, 'email', array(
                    'class' => 'of-input of-input_email',
                    'placeholder' => Yii::t('views.layouts.main', 'placeholder-email')
                )); ?>
                <?= $form->error($this->callme, 'email'); ?>
                <?= $form->textArea($this->callme, 'text', array(
                    'class' => 'of-textarea',
                    'placeholder' => Yii::t('views.layouts.main', 'placeholder-text')
                )); ?>
                <?= $form->error($this->callme, 'text'); ?>
                <span>
                    <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                    <a href="javascript:" class="of-submit of-submit-form submit-link">
                        <?= Yii::t('views.layouts.main', 'submit-ask'); ?>
                    </a>
                </span>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>
<script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js?v=<?= filemtime(__DIR__ . '/../../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
<script src="/js/vendor/libs.js?v=<?= filemtime(__DIR__ . '/../../../js/vendor/libs.js'); ?>"></script>
<?php if ('contact' == $this->uniqueid) { ?>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAYBg8KC7jzGXqsJO4ZvBUBr-zHT_0qm2s"></script>
<?php } ?>
<script src="/js/main.js?v=<?= filemtime(__DIR__ . '/../../../js/main.js'); ?>"></script>
<script src="/js/site.js?v=<?= filemtime(__DIR__ . '/../../../js/site.js'); ?>"></script>
</body>
</html>