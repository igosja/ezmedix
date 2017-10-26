<?php
/**
 * @var $form   CActiveForm
 * @var $o_user User
 */
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= Yii::t('views.profile.update', 'hello'); ?>
                    <?= $o_user['name']; ?>!
                </h1>
            </div>
        </div>
        <div class="wrap clearfix">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
            )); ?>
            <div class="clearfix">
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                        <?= Yii::t('views.profile.update', 'label-name'); ?>
                    </div>
                    <?= $form->textField($o_user, 'name', array('class' => 'log-input')); ?>
                    <?= $form->error($o_user, 'name'); ?>
                </div>
                <div class="lk-3" style="opacity: 0;">
                    <div class="lk-3__title lk-3__title_sm lk-3__title_nm">.</div>
                    <input type="text" class="log-input">
                </div>
                <div class="lk-3"></div>
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                        <?= Yii::t('views.profile.update', 'label-phone'); ?>
                    </div>
                    <?= $form->textField($o_user, 'phone', array('class' => 'log-input phone_mask')); ?>
                    <?= $form->error($o_user, 'phone'); ?>
                </div>
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                        <?= Yii::t('views.profile.update', 'label-email'); ?>
                    </div>
                    <?= $form->textField($o_user, 'email', array('class' => 'log-input')); ?>
                    <?= $form->error($o_user, 'email'); ?>
                </div>
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                        <?= Yii::t('views.profile.update', 'label-address'); ?>
                    </div>
                    <?= $form->textField($o_user, 'address', array('class' => 'log-input')); ?>
                    <?= $form->error($o_user, 'address'); ?>
                </div>
            </div>
            <div class="centered">
                <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                <a href="javascript:" class="btn submit-link">
                    <?= Yii::t('views.profile.update', 'submit'); ?>
                </a>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>