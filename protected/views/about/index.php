<?php
/**
 * @var $o_page PageAbout
 */
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= $o_page['h1_' . Yii::app()->language]; ?>
                </h1>
            </div>
        </div>
        <div class="wrap">
            <div class="about clearfix">
                <h3 class="about__title"><?= $o_page['h3_' . Yii::app()->language]; ?></h3>
                <?= $o_page['text_1_' . Yii::app()->language]; ?>
                <div class="about-cert">
                    <h3 class="about__title"><?= Yii::t('views.about.index', 'sertificate'); ?></h3>
                    <div class="cat__items clearfix">
                        <?php if (isset($o_page['image_1'])) { ?>
                            <a href="javascript:" class="cat__i">
                                <span class="cat__i__img">
                                    <img
                                            src="<?= ImageIgosja::resize($o_page['image_1_id'], 280, 280); ?>"
                                            alt="<?= $o_page['h1_' . Yii::app()->language]; ?>"
                                    />
                                </span>
                            </a>
                        <?php } ?>
                        <?php if (isset($o_page['image_2'])) { ?>
                            <a href="javascript:" class="cat__i">
                                <span class="cat__i__img">
                                    <img
                                            src="<?= ImageIgosja::resize($o_page['image_2_id'], 280, 280); ?>"
                                            alt="<?= $o_page['h1_' . Yii::app()->language]; ?>"
                                    />
                                </span>
                            </a>
                        <?php } ?>
                        <?php if (isset($o_page['image_3'])) { ?>
                            <a href="javascript:" class="cat__i">
                                <span class="cat__i__img">
                                    <img
                                            src="<?= ImageIgosja::resize($o_page['image_3_id'], 280, 280); ?>"
                                            alt="<?= $o_page['h1_' . Yii::app()->language]; ?>"
                                    />
                                </span>
                            </a>
                        <?php } ?>
                        <?php if (isset($o_page['image_4'])) { ?>
                            <a href="javascript:" class="cat__i">
                                <span class="cat__i__img">
                                    <img
                                            src="<?= ImageIgosja::resize($o_page['image_4_id'], 280, 280); ?>"
                                            alt="<?= $o_page['h1_' . Yii::app()->language]; ?>"
                                    />
                                </span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <?= $o_page['text_2_' . Yii::app()->language]; ?>
            </div>
        </div>
    </div>
</section>