<?php
/**
 * @var $a_news array
 * @var $a_slide array
 * @var $o_page PageMain
 */
?>
<section class="content">
    <div class="main-slider" id="slider">
        <?php foreach ($a_slide as $item) { ?>
            <div class="item" style="background: url(<?= ImageIgosja::resize($item['image_id'], 1920, 700)?>) center top no-repeat;">
                <div class="wrap">
                    <img src="/img/m-banner-logo.png" alt="<?= $item['h1_' . Yii::app()->language]; ?>">
                    <div class="m-slider__title"><?= $item['h1_' . Yii::app()->language] ? $item['h1_' . Yii::app()->language] : ''; ?></div>
                    <div class="m-slider__text">
                        <?= $item['text_' . Yii::app()->language] ? nl2br($item['text_' . Yii::app()->language]) : ''; ?>
                    </div>
                    <?php if ($item['url']) { ?>
                        <div class="centered">
                            <a href="<?= $item['url']; ?>" class="btn">
                                <?= $item['link_' . Yii::app()->language] ? $item['link_' . Yii::app()->language] : ''; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="main-cat">
        <div class="wrap">
            <h2 class="title"><?= Yii::t('views.index.index', 'h2-product'); ?></h2>
            <div class="cleerfix cats">
                <?php foreach ($this->a_chapter as $item) { ?>
                    <?= CHtml::link(
                        '<img src="' . $item['image']['url'] . '" alt="' . $item['h1_' . Yii::app()->language] . '">' . $item['h1_' . Yii::app()->language],
                        array('category/view', $item['url']),
                        array('class' => 'cats__i')
                    ); ?>
                <?php } ?>
            </div>
            <div class="btn-more__out">
                <?= CHtml::link(
                    Yii::t('views.index.index', 'all-product'),
                    array('category/index'),
                    array('class' => 'btn-more')
                )?>
            </div>
            <div class="main-cat__text">
                <?= $o_page['text_1_' . Yii::app()->language]; ?>
            </div>
        </div>
    </div>
    <div class="main-b">
        <div class="wrap">
            <div class="main-b__in">
                <?= $o_page['text_2_' . Yii::app()->language]; ?>
            </div>
        </div>
    </div>
    <div class="main-news">
        <div class="wrap clearfix">
            <h2 class="title"><?= Yii::t('views.index.index', 'h2-news'); ?></h2>
            <div class="clearfix news">
                <?php foreach ($a_news as $item) { ?>
                    <?= CHtml::link(
                        '<img
                            src="' . ImageIgosja::resize($item['image_id'], 370, 201) . '"
                            alt="' . $item['h1_' . Yii::app()->language] . '"
                        />
                        <span class="news__i__date">' . date('d.m.Y', $item['date']) . '</span>
                        <span class="news__i__title">' . $item['h1_' . Yii::app()->language] . '</span>
                        <span class="news__i__text">' . mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0,
                            350) . '</span>
                        <span class="news__i__link">' . Yii::t('views.index.index', 'link-detail') . '</span>',
                        array('news/view', 'id' => $item['url']),
                        array('class' => 'news__i')
                    ) ?>
                <?php } ?>
            </div>
            <div class="news-more">
                <?= CHtml::link(
                    Yii::t('views.index.index', 'all-news'),
                    array('news/index'),
                    array('class' => 'btn-more')
                ); ?>
            </div>
        </div>
    </div>
    <div class="gr-text">
        <div class="wrap">
            <?= $o_page['text_3_' . Yii::app()->language]; ?>
        </div>
    </div>
</section>