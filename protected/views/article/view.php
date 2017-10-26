<?php
/**
 * @var $o_news News
 * @var $o_next News
 * @var $o_prev News
 * @var $pre string
 * @var $text string
 */
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= $o_news['h1_' . Yii::app()->language]; ?>
                </h1>
            </div>
        </div>
        <div class="wrap">
            <div class="news-one">
                <div class="clearfix news-one__pre">
                    <div class="news-one__pre__left">
                        <?= $pre; ?>
                        <div class="news-one__pre__bt clearfix">
                            <span class="news-one__pre__date">
                                <?= date('d.m.Y', $o_news['date']); ?>
                            </span>
                            <span class="news-one__pre__soc">
                                <?= Yii::t('views.article.view', 'share'); ?>
                            </span>
                        </div>
                    </div>
                    <div class="news-one__pre__right">
                        <img
                                src="<?= ImageIgosja::resize($o_news['image_id'], 700, 470); ?>"
                                alt="<?= $o_news['h1_' . Yii::app()->language]; ?>"
                        />
                    </div>
                </div>
                <?= $text; ?>
                <div class="news-one__pager clearfix">
                    <?php if ($o_prev) { ?>
                        <?= CHtml::link(
                            Yii::t('views.article.view', 'link-prev'),
                            array('view', 'id' => $o_prev['url']),
                            array('class' => 'news-one__pager___prev')
                        ); ?>
                    <?php } ?>
                    <?= CHtml::link(
                        Yii::t('views.article.view', 'link-all'),
                        array('index'),
                        array('class' => 'news-one__pager__more')
                    ); ?>
                    <?php if ($o_next) { ?>
                        <?= CHtml::link(
                            Yii::t('views.article.view', 'link-next'),
                            array('view', 'id' => $o_next['url']),
                            array('class' => 'news-one__pager___next')
                        ); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>