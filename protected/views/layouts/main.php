<?php
/**
 * @var $content string
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js homepage"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i,800&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/css/normalize.min.css">
    <link rel="stylesheet" href="/css/libs.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" href="/css/mobile.css">-->
    <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="/js/vendor/libs.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/site.js"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a target="_blank" rel="nofollow" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="sitewrap">
    <header class="header">
        <div class="wrap clearfix">
            <div class="header__logo">
                <?= CHtml::link('<img src="/img/logo.png" alt="Ezmedix">', array('index/index')); ?>
            </div>
            <div class="header__info clearfix">
                <a href="javascript:" class="facebook-btn"></a>
                <a href="javascript:" class="twitter-btn"></a>
                <a href="javascript:" class="header__log-in">Войти</a>
                <div class="lang-select">
                    <form method="post" class="lang-select">
                        <select name="language" id="language-select">
                            <?php foreach ($this->a_language as $item) { ?>
                                <option
                                        value="<?= $item['code']; ?>"
                                        <?php if ($item['code'] == Yii::app()->language) { ?>selected<?php } ?>
                                >
                                    <?= $item['name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="header__search clearfix">
                <form action="">
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
                    <a href="index-about-us.html">О нас</a>
                </li>
                <li class="nav-h">
                    <a href="javascript:;" class="nav__arrow">Продукция</a>
                    <div class="nav__drop">
                        <div class="wrap">
                            <div class="nav__drop__i">
                                <a href="index-catalog.html" class="nav__drop__link">
                                    <img src="/img/cats/cat-1.png" alt="">
                                    Дентальная профилактика
                                </a>
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-2.png" alt="">
                                    Дезинфекция систем аспирации
                                </a>
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-3.png" alt="">
                                    Дезинфекция шлангов DUWLS
                                </a>
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-4.png" alt="">
                                    Дезинфекция поверхностей
                                </a>
                            </div>

                            <div class="nav__drop__i">
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-5.png" alt="">
                                    Дезинфекция дентального инструментария
                                </a>
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-6.png" alt="">
                                    Стерилизация стомато инструментария
                                </a>
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-7.png" alt="">
                                    Очистка и дезинфекция автоклава
                                </a>
                            </div>

                            <div class="nav__drop__i">
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-8.png" alt="">
                                    Дезинфекция оттисков
                                </a>
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-9.png" alt="">
                                    Расходные материалы</a>
                                <a href="" class="nav__drop__link">
                                    <img src="/img/cats/cat-10.png" alt="">
                                    Действующие акции</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="index-partners.html">Партнеры</a>
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
                    <a href="index-contacts.html">Контакты</a>
                </li>
            </ul>
            <a href="javascript:;" data-selector="form-call" class="nav-btn overlayElementTrigger">Спрашивайте!</a>
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
                    <a href="/index-about-us.html">О нас</a>
                    <a href="/index-production.html">Продукция</a>
                    <a href="/index-partners.html">Партнеры</a>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-news'),
                        array('news/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'footer-link-article'),
                        array('article/index')
                    ); ?>
                    <a href="/index-contacts.html">Контакты</a>
                </div>
                <div class="footer-top__f__info">
                    <a href="javascript:" class="facebook-btn"></a>
                    <a href="javascript:" class="twitter-btn"></a>
                    <a href="javascript:" data-selector="form-call" class="footer-btn overlayElementTrigger">Спрашивайте!</a>
                </div>
            </div>
            <div class="footer-top__s clearfix">
                <div class="footer-top__s__i">
                    <ul>
                        <li><a href="">Дентальная профилактика</a></li>
                        <li><a href="">Дезинфекция систем аспирации</a></li>
                        <li><a href="">Дезинфекция шлангов</a></li>
                        <li><a href="">Дезинфекция поверхности</a></li>
                    </ul>
                </div>
                <div class="footer-top__s__i">
                    <ul>
                        <li><a href="">Дезинфекция дентального инструментария</a></li>
                        <li><a href="">Стерилизация стомато инструментария</a></li>
                        <li><a href="">Очистка и дезинфекция автоклава</a></li>
                        <li><a href="">Дезинфекция оттисков</a></li>
                    </ul>
                </div>
                <div class="footer-top__s__i">
                    <ul>
                        <li><a href="">Расходные материалы</a></li>
                        <li><a href="">Действующие акции</a></li>
                    </ul>
                </div>
                <div class="footer-top__s__i">
                    <div class="footer-top__grafik">
                        <strong>График работы:</strong>
                        Понедельник-Пятница с 10 до 17 00
                    </div>
                    <div class="header__search clearfix">
                        <form action="">
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
                <img src="/img/footer-logo.png" alt=""> EZMEDIX © 2008—<?= date('Y'); ?>  Все права защищены
            </div>
            <div class="footer-frog">
                <a href="">Создание сайта —<img src="/img/frog.png" alt=""></a>
            </div>
        </div>
    </div>
</footer>
<section class="overlay-forms">
    <div class="form-overlay"></div>
    <div class="wrap">
        <div class="of-form form-call">
            <a href="javascript:" class="of-close"></a>
            <form>
                <div class="of-form__title">Спрашивайте!</div>
                <div class="of-wrap clearfix">
                    <input type="text" class="of-input of-input_name" placeholder="Ваше Имя:" required />
                    <input type="tel" class="of-input of-input_phone phone_mask" placeholder="Контактный телефон:" required />
                    <input type="email" class="of-input of-input_email" placeholder="E-mail:" required />
                    <textarea class="of-textarea" placeholder="Ваш вопрос:"></textarea>
                    <a href="javascript:" class="of-submit of-submit-form">Отправить</a>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>