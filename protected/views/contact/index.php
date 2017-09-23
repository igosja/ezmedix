<?php
/**
 * @var $form   CActiveForm
 * @var $model  FeedBack
 * @var $o_page Contact
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
            <div class="contacts clearfix">
                <div class="contacts__left">
                    <div class="contacts__i">
                        <h3 class="partners__item__title">
                            <?= Yii::t('views.contact.index', 'address'); ?>
                        </h3>
                        <div class="partners__item__adress">
                            <?= nl2br($o_page['address_' . Yii::app()->language]); ?>
                        </div>
                    </div>
                    <div class="contacts__i">
                        <h3 class="partners__item__title">
                            <?= Yii::t('views.contact.index', 'phone'); ?>
                        </h3>
                        <div class="partners__item__phones">
                            <?= nl2br($o_page['phone_' . Yii::app()->language]); ?>
                        </div>
                    </div>
                    <div class="contacts__i">
                        <h3 class="partners__item__title">E-mail</h3>
                        <a href="javascript:"><?= $o_page['email']; ?></a>
                    </div>
                    <div class="contacts__i">
                        <h3 class="partners__item__title">
                            <?= Yii::t('views.contact.index', 'schedule'); ?>
                        </h3>
                        <span class="contacts__i__clock">
                            <?= nl2br($o_page['schedule_' . Yii::app()->language]); ?>
                        </span>
                    </div>
                </div>
                <div class="contacts__right">
                    <h3 class="partners__item__title"><?= Yii::t('views.contact.index', 'h3'); ?></h3>
                    <p class="contacts__text"><?= Yii::t('views.contact.index', 'p'); ?></p>
                    <div class="contacts__form clearfix">
                        <?php $form = $this->beginWidget('CActiveForm', array(
                            'enableAjaxValidation' => false,
                            'enableClientValidation' => true,
                            'id' => 'page-form'
                        )); ?>
                        <div class="clearfix">
                            <div class="contacts__form__half">
                                <?= $form->label($model, 'name', array('class' => 'log-label')); ?>
                                <?= $form->textField($model, 'name', array('class' => 'of-input')); ?>
                                <?= $form->error($model, 'name'); ?>
                            </div>
                            <div class="contacts__form__half">
                                <?= $form->label($model, 'clinic', array('class' => 'log-label')); ?>
                                <?= $form->textField($model, 'clinic', array('class' => 'of-input')); ?>
                                <?= $form->error($model, 'clinic'); ?>
                            </div>
                            <div class="contacts__form__half">
                                <?= $form->label($model, 'phone', array('class' => 'log-label')); ?>
                                <?= $form->textField($model, 'phone', array('class' => 'of-input phone_mask')); ?>
                                <?= $form->error($model, 'phone'); ?>
                            </div>
                            <div class="contacts__form__half">
                                <?= $form->label($model, 'email', array('class' => 'log-label')); ?>
                                <?= $form->textField($model, 'email', array('class' => 'of-input')); ?>
                                <?= $form->error($model, 'email'); ?>
                            </div>
                        </div>
                        <?= $form->label($model, 'text', array('class' => 'log-label')); ?>
                        <?= $form->textArea($model, 'text', array('class' => 'of-textarea')); ?>
                        <?= $form->error($model, 'text'); ?>
                        <div style="text-align: right;">
                            <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                            <a href="javascript:" class="btn submit-link">
                                <?= Yii::t('views.contact.index', 'submit'); ?>
                            </a>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="map" id="map" data-lat="<?= $o_page['lat']; ?>" data-lng="<?= $o_page['lng']; ?>"></div>
    </div>
</section>