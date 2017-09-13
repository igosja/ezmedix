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
                            '<span class="badge">' . ($this->feedback ? $this->feedback : '') . '</span> Вопросы',
                            array('feedback/index')
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
                                <?= CHtml::link('Категории', array('category/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagecatalog/index')); ?>
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
                        <a href="javascript:">Партнёры<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Партнёры', array('partner/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagepartner/index')); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:">Статьи<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= CHtml::link('Статьи', array('article/index')); ?>
                            </li>
                            <li>
                                <?= CHtml::link('SEO', array('pagearticle/index')); ?>
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
                        <?= CHtml::link('О нас', array('pageabout/index')); ?>
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