<?php
/**
 * @var $o_user User
 */
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= Yii::t('views.profile.index', 'hello'); ?>
                    <?= $o_user['name']; ?>!
                </h1>
            </div>
        </div>
        <div class="wrap clearfix">
            <div class="lk-3">
                <h3 class="lk-3__title">
                    <?= Yii::t('views.profile.index', 'profile'); ?>
                </h3>
                <?= CHtml::link(
                    Yii::t('views.profile.index', 'link-profile'),
                    array('view'),
                    array('class' => 'lk-3__l-1')
                )?>
            </div>
            <div class="lk-3">
                <h3 class="lk-3__title">
                    <?= Yii::t('views.profile.index', 'product'); ?>
                </h3>
                <?= CHtml::link(
                    Yii::t('views.profile.index', 'link-product'),
                    array('product'),
                    array('class' => 'lk-3__l-2')
                )?>
            </div>
            <div class="lk-3">
                <h3 class="lk-3__title">
                    <?= Yii::t('views.profile.index', 'order'); ?>
                </h3>
                <?= CHtml::link(
                    Yii::t('views.profile.index', 'link-order'),
                    array('order'),
                    array('class' => 'lk-3__l-3')
                )?>
            </div>
        </div>
    </div>
</section>