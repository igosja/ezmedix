<?php
/**
 * @var $content string
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/js/jquery.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Административный раздел">
    <title>Административный раздел</title>
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= CHtml::link('Админ', array('index/index'), array('class' => 'navbar-brand')); ?>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                    <span class="badge"><?= ($this->notification ? $this->notification : ''); ?></span>
                    <i class="fa fa-envelope fa-fw"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <?= CHtml::link(
                            '<span class="badge">' . ($this->callme ? $this->callme : '') . '</span> Обратные звонки',
                            array('callme/index')
                        ); ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?= CHtml::link(
                            '<span class="badge">' . ($this->order ? $this->order : '') . '</span> Заказы',
                            array('order/index')
                        ); ?>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <?= CHtml::link('<i class="fa fa-sign-out fa-fw"></i>', array('/site/logout')); ?>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="javascript:">Товары<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Товары', array('product/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Простые товары', array('productsimple/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Категории', array('category/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Видео<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Видео', array('video/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Категории', array('videocategory/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagevideo/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Новости<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Новости', array('news/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagenews/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Отзывы<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Отзывы', array('review/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagereview/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Реализованные проекты<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Реализованные проекты', array('project/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Категории', array('projectcategory/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Тексты и SEO', array('pageproject/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Главная страница<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Тексты и SEO', array('pagemain/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('Слайдер', array('slide/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Текстовые страницы<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="javascript:">Бесплатная косультация<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= CHtml::link('Вопросы', array('consult/index')); ?>
                                    </li>
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pageconsult/index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:">Гарантии<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pageguarantee/index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:">Диллерам<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pagedealer/index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:">Котлы в кредит<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pagecredit/index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:">О компании<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pageabout/index')); ?>
                                    </li>
                                    <li>
                                        <?= CHtml::link('Достижения', array('achievement/index')); ?>
                                    </li>
                                    <li>
                                        <?= CHtml::link('Фото с нами', array('aboutphoto/index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:">Оплата и доставка<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pagepayment/index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:">Почему мы<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pagewhy/index')); ?>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:">Преимущества<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= CHtml::link('Преимущества', array('advantage/index')); ?>
                                    </li>
                                    <li>
                                        <?= CHtml::link('Тексты и SEO', array('pageadvantage/index')); ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?= CHtml::link('Контакты', array('contact/index')); ?>
                    </li>
                    <li>
                        <?= CHtml::link('Языки', array('language/index')); ?>
                    </li>
                    <li>
                        <?= CHtml::link('Переводы', array('translate/index')); ?>
                    </li>
                    <li>
                        <?= CHtml::link('Sitemap', array('sitemap/index')); ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page-wrapper">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'separator' => '',
            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
            'inactiveLinkTemplate' => '<li class="active">{label}</li>',
            'tagName' => 'ul',
            'htmlOptions' => array('class' => 'breadcrumb'),
            'links' => $this->breadcrumbs,
        )); ?>
        <?= $content; ?>
    </div>
</div>
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/bootstrap-toggle.min.js"></script>
<script src="/js/rowsorter.js"></script>
<script src="/js/admin.min.js"></script>
<script src="/js/admin.js"></script>
</body>
</html>