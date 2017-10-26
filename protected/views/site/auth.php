<?php
/**
 * @var $form CActiveForm
 * @var $model User
 */
?>
<section class="content">
    <div class="log-page">
        <div class="wrap">
            <h1 class="log-page__title">
                <?= Yii::t('views.site.auth', 'h1'); ?>
            </h1>
            <p class="log-page__text">
                <?= Yii::t('views.site.auth', 'text'); ?>
            </p>
            <div class="centered not-loged-btns">
                <?= CHtml::link(
                    Yii::t('views.site.auth', 'link-login'),
                    array('site/login'),
                    array('class' => 'btn')
                ); ?>
                <?= CHtml::link(
                    Yii::t('views.site.auth', 'link-signup'),
                    array('site/signup'),
                    array('class' => 'btn btn_light')
                ); ?>
            </div>
        </div>
    </div>
    <div class="gr-text">
        <div class="wrap">
            <?= Yii::t('views.site.auth', 'info'); ?>
        </div>
    </div>
</section>