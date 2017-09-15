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
                <?= Yii::t('views.site.login', 'h1'); ?>
            </h1>
            <div class="login">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                )); ?>
                    <label class="log-label"><?= Yii::t('views.site.login', 'label-login'); ?></label>
                    <?= $form->textField($model, 'login', array('autofocus' => true, 'class' => 'log-input log-input__login')); ?>
                    <?= $form->error($model, 'login'); ?>
                    <div class="clearfix">
                        <label class="log-label"><?= Yii::t('views.site.login', 'label-password'); ?></label>
                        <?= CHtml::link(
                            Yii::t('views.site.login', 'link-forget'),
                            array('site/forget')
                        ); ?>
                    </div>
                    <?= $form->passwordField($model, 'password', array('class' => 'log-input log-input__password')); ?>
                    <?= $form->error($model, 'password'); ?>
                    <div class="centered">
                        <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                        <a href="javascript:" class="btn submit-link">
                            <?=Yii::t('views.contact.index', 'submit'); ?>
                        </a>
                        <div class="login__text">
                            <?=Yii::t('views.contact.index', 'or'); ?>
                            <?= CHtml::link(
                                Yii::t('views.site.login', 'link-signup'),
                                array('site/signup')
                            ); ?>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>