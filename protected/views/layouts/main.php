<?php
/**
 * @var $content string
 * @var $form CActiveForm
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>        +
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
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,900&amp;subset=cyrillic-ext' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="/css/normalize.min.css">
    <link rel="stylesheet" href="/css/libs.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/mobile.css">
    <link rel="stylesheet" href="/css/site.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
</head>
<body <?php if ('index' != $this->uniqueId) { ?>class="inn-page"<?php } ?>>
<!--[if lt IE 7]>
<p class="browsehappy">
    You are using an <strong>outdated</strong> browser. Please
    <a target="_blank" rel="nofollow" href="http://browsehappy.com/">upgrade your browser</a>
    to improve your experience.
</p>
<![endif]-->
<div class="sitewrap">
    <header class="clearfix">
        <div class="header-top clearfix">
            <div class="wrap">
                <nav class="menu-sec">
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-about-us'),
                        array('about/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-news'),
                        array('news/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-video'),
                        array('video/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-review'),
                        array('review/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-payment'),
                        array('payment/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-guarantee'),
                        array('guarantee/index')
                    ); ?>
                    <?= CHtml::link(
                        Yii::t('views.layouts.main', 'header-link-contact'),
                        array('contact/index')
                    ); ?>
                </nav>
                <div class="lang">
                    <?php
                    foreach ($this->a_language as $item) {
                        ?>
                        <a
                                href="javascript:"
                                class="change-language <?php if (Yii::app()->language == $item->code) { ?>active<?php } ?>"
                                data-language="<?= $item->code; ?>"
                        >
                            <?= $item->name; ?>
                        </a>
                    <?php } ?>

                    <form method="post" id="language-form" style="display:none;">
                        <label for="language-select">Language</label>
                        <select name="language" id="language-select">
                            <?php foreach ($this->a_language as $item) { ?>
                                <option
                                        value="<?= $item->code; ?>"
                                        <?php if (Yii::app()->language == $item->code) { ?>selected<?php } ?>
                                >
                                    <?= $item->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </form>
                </div>

                <div class="header-adress-show"></div>
                <div class="header-work-show"></div>
                <div class="header-phones-show"></div>
                <div class="header-menu-show"></div>
            </div>
        </div>
        <div class="header-bot">
            <div class="wrap clearfix">
                <?= CHtml::link(
                    '<img src="/img/logo.png" alt="Marten">',
                    array('index/index'),
                    array('class' => 'logo')
                ); ?>
                <div class="header-bot__l">
                    <span class="header-adress">
                        <small></small>
                        <?= $this->contact['address_head_' . Yii::app()->language]; ?>
                    </span>
                    <span class="header-work">
                        <small></small>
                        <?= Yii::t('views.layouts.main', 'monday'); ?>
                        &nbsp;<?= $this->contact['hours_monday']; ?>&nbsp;
                        <br />
                        <?= Yii::t('views.layouts.main', 'saturday'); ?><strong></strong>&nbsp;
                        <?= $this->contact['hours_saturday']; ?>
                    </span>
                </div>
                <div class="header-bot__r header-phones clearfix">
                    <a href="javascript:" data-selector="form-call" class="header-bot__btn overlayElementTrigger">
                        <?= Yii::t('views.layouts.main', 'call-me'); ?>
                    </a>
                    <div class="header-bot__phones">
                        <a href="tel:<?= $this->contact['phone_kyivstar']; ?>"><?= $this->contact['phone_kyivstar']; ?></a>
                        <a href="tel:<?= $this->contact['phone_umc']; ?>"><?= $this->contact['phone_umc']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="wrap">
        <nav class="nav-main">
            <a href="javascript:" class="menu-close"></a>
            <ul>
                <?php foreach ($this->a_category as $item) { ?>
                    <li>
                        <?= CHtml::link(
                            '<span>' . $item['name'] . ((isset($item['children']) || isset($item['product'])) ? '<small></small>' : '') . '</span>',
                            array('category/view', 'id' => $item['url']),
                            array('class' => 'drop')
                        ); ?>
                        <?php if ((isset($item['children']) && $item['children']) || (isset($item['product']) && $item['product'])) { ?>
                            <ul>
                                <?php if (isset($item['children']) && $item['children']) { ?>
                                    <?php foreach ($item['children'] as $child) { ?>
                                        <li>
                                            <?= CHtml::link(
                                                $child['name'] . (isset($child['product']) ? '<span></span>' : ''),
                                                array('category/view', 'id' => $child['url']),
                                                array('class' => 'drop')
                                            ); ?>
                                            <?php if (isset($child['product']) && $child['product']) { ?>
                                                <?php foreach ($child['product'] as $product) { ?>
                                                    <ul>
                                                        <li>
                                                            <?= CHtml::link(
                                                                $product['name'],
                                                                array('product/view', 'id' => $product['url']),
                                                                array('class' => 'drop')
                                                            ); ?>
                                                        </li>
                                                    </ul>
                                                <?php } ?>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                                <?php if (isset($item['product']) && $item['product']) { ?>
                                    <?php foreach ($item['product'] as $product) { ?>
                                        <li>
                                            <?= CHtml::link(
                                                $product['name'],
                                                array('product/view', 'id' => $product['url']),
                                                array('class' => 'drop')
                                            ); ?>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <?= $content; ?>
    <div class="clearfix-footer"></div>
</div>
<footer>
    <div class="footer-top">
        <div class="wrap clearfix">
            <div class="footer-menu">
                <h3 class="footer-menu__title">
                    <?= Yii::t('views.layouts.main', 'footer-who-we-are'); ?>
                </h3>
                <ul>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-about-us'),
                            array('about/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-project'),
                            array('project/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-news'),
                            array('news/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-video'),
                            array('video/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-review'),
                            array('review/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-contact'),
                            array('contact/index')
                        ); ?>
                    </li>
                </ul>
            </div>
            <div class="footer-menu">
                <h3 class="footer-menu__title">
                    <?= Yii::t('views.layouts.main', 'footer-production'); ?>
                </h3>
                <ul>
                    <?php foreach ($this->a_category as $item) { ?>
                        <li>
                            <?= CHtml::link(
                                $item['name'],
                                array('category/view', 'id' => $item['url'])
                            ); ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-menu">
                <h3 class="footer-menu__title">
                    <?= Yii::t('views.layouts.main', 'footer-services'); ?>
                </h3>
                <ul>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-payment'),
                            array('payment/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-guarantee'),
                            array('guarantee/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-credit'),
                            array('credit/index')
                        ); ?>
                    </li>
                    <li>
                        <?= CHtml::link(
                            Yii::t('views.layouts.main', 'footer-link-dealer'),
                            array('dealer/index')
                        ); ?>
                    </li>
                </ul>
            </div>
            <div class="footer-menu">
                <h3 class="footer-menu__title">
                    <?= Yii::t('views.layouts.main', 'footer-contacts'); ?>
                </h3>
                <ul>
                    <li class="footer-menu__ic1">
                        <?= str_replace(',',',<br/>', $this->contact['address_head_' . Yii::app()->language]); ?>
                    </li>
                    <li class="footer-menu__ic2">
                        <a href="tel:<?= $this->contact['phone_umc']; ?>">
                            <?= $this->contact['phone_umc']; ?>
                        </a>
                    </li>
                    <li class="footer-menu__ic3">
                        <a href="tel:<?= $this->contact['phone_kyivstar']; ?>">
                            <?= $this->contact['phone_kyivstar']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="tel:<?= $this->contact['phone_life']; ?>">
                            <?= $this->contact['phone_life']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/kotly.marten/" class="footer-facebook" target="_blank"></a>
                        <a href="https://www.youtube.com/channel/UC9-u7r_nzsRDSb00PCfmBww?view_as=subscriber" class="footer-twitter" target="_blank"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap clearfix">
            <div class="footer-copy">
                <img src="/img/logo-bottom.png" alt="Marten">
                <span>
                    © 2008—<?= date('Y'); ?>
                    <?= Yii::t('views.layouts.main', 'rights-reserved'); ?>
                </span>
            </div>
            <div class="footer-bottom__r clearfix">
                <div class="footer-frog">
                    <span>
                        <?= Yii::t('views.layouts.main', 'site-creation'); ?> —
                    </span>
                    <img src="/img/frog.png" alt="Gabbe">
                </div>
                <a href="javascript:" id="to-top">
                    <img src="/img/to-top.png" alt="to top">
                </a>
            </div>
        </div>
    </div>
</footer>
<section class="overlay-forms">
    <div class="form-overlay"></div>
    <div class="wrap">
        <!-- заказать звонок -->
        <div class="of-form form-call">
            <a href="javascript:" class="of-close"></a>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'id' => 'form-call-me'
            )); ?>
            <div class="of-form__title"><?= Yii::t('views.layouts.main', 'form-call-me'); ?></div>
            <div class="of-wrap clearfix">
                <?= CHtml::label(
                    Yii::t('views.layout.index', 'form-call-me-label-name') . ' <span></span>',
                    '',
                    array('class' => 'of-label')
                ); ?>
                <?= $form->textField($this->callme, 'name', array('class' => 'of-input of-input_name')); ?>
                <?= $form->error($this->callme, 'name'); ?>
                <?= CHtml::label(
                    Yii::t('views.layout.index', 'form-call-me-label-phone') . ' <span></span>',
                    '',
                    array('class' => 'of-label')
                ); ?>
                <?= $form->textField($this->callme, 'phone', array('class' => 'of-input of-input_phone phone_mask')); ?>
                <?= $form->error($this->callme, 'phone'); ?>
                <a href="javascript:" class="of-show">
                    <?= Yii::t('views.layouts.main', 'form-info'); ?>
                </a>
                <?= $form->textArea($this->callme, 'text', array('class' => 'of-textarea')); ?>
                <?= $form->error($this->callme, 'text'); ?>
                <?= CHtml::submitButton(
                    Yii::t('views.layouts.main', 'button-submit'),
                    array('class' => 'of-submit of-submit-form')
                ); ?>
                <div class="of-note">
                    <span></span><?= Yii::t('views.layouts.main', 'form-required'); ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
        <!-- купить -->
        <div class="of-form form-buy">
            <a href="javascript:" class="of-close"></a>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'id' => 'form-order'
            )); ?>
            <div class="of-form__title"><?= Yii::t('views.layouts.main', 'form-order'); ?></div>
            <div class="of-wrap clearfix">
                <div class="clearfix form-buy__b">
                    <div class="form-buy__img">
                        <img src="/img/trash/img-form.png" alt="">
                    </div>
                    <div class="form-buy__text">
                        Котел твердотопливный Atmos DC75SE (пиролизный)
                    </div>
                </div>
                <?= $form->hiddenField($this->order, 'product'); ?>
                <?= $form->hiddenField($this->order, 'power'); ?>
                <?= $form->hiddenField($this->order, 'price'); ?>
                <?= CHtml::label(
                    Yii::t('views.layout.index', 'form-order-label-name') . ' <span></span>',
                    '',
                    array('class' => 'of-label')
                ); ?>
                <?= $form->textField($this->order, 'name', array('class' => 'of-input of-input_name')); ?>
                <?= $form->error($this->order, 'name'); ?>
                <?= CHtml::label(
                    Yii::t('views.layout.index', 'form-order-label-phone') . ' <span></span>',
                    '',
                    array('class' => 'of-label')
                ); ?>
                <?= $form->textField($this->order, 'phone', array('class' => 'of-input of-input_phone phone_mask')); ?>
                <?= $form->error($this->order, 'phone'); ?>
                <?= CHtml::label(
                    Yii::t('views.layout.index', 'form-order-label-email'),
                    '',
                    array('class' => 'of-label')
                ); ?>
                <?= $form->textField($this->order, 'email', array('class' => 'of-input of-input_email')); ?>
                <?= $form->error($this->order, 'email'); ?>
                <a href="javascript:" class="of-show">
                    <?= Yii::t('views.layouts.main', 'form-info'); ?>
                </a>
                <?= $form->textArea($this->order, 'text', array('class' => 'of-textarea')); ?>
                <?= $form->error($this->order, 'text'); ?>
                <?= CHtml::submitButton(
                    Yii::t('views.layouts.main', 'button-submit'),
                    array('class' => 'of-submit of-submit-form')
                ); ?>
                <div class="of-note">
                    <span></span><?= Yii::t('views.layouts.main', 'form-required'); ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>
<script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="/js/vendor/libs.js"></script>
<script src="/js/main.js"></script>
<script src="/js/site.js"></script>
<script src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<?php if ('contact' == $this->uniqueid) { ?>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAYBg8KC7jzGXqsJO4ZvBUBr-zHT_0qm2s&callback=initMap"></script>
<?php } ?>
</body>
</html>