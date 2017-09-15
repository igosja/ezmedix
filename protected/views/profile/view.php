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
                    <?= Yii::t('views.profile.view', 'hello'); ?>
                    <?= $o_user['name']; ?>!
                </h1>
            </div>
        </div>
        <div class="wrap clearfix">
            <div class="clearfix">
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm">
                        <?= Yii::t('views.profile.view', 'name'); ?>
                    </div>
                    <div class="lk-prop">
                        <?= $o_user['name']; ?>
                    </div>
                </div>
                <div class="lk-3" style="opacity: 0;">
                    <div class="lk-3__title lk-3__title_sm">.</div>
                    <div class="lk-prop">.</div>
                </div>
                <div class="lk-3"></div>
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm">
                        <?= Yii::t('views.profile.view', 'phone'); ?>
                    </div>
                    <div class="lk-prop">
                        <?= $o_user['phone']; ?>
                    </div>
                </div>
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm">
                        <?= Yii::t('views.profile.view', 'email'); ?>
                    </div>
                    <div class="lk-prop">
                        <?= $o_user['email']; ?>
                    </div>
                </div>
                <div class="lk-3">
                    <div class="lk-3__title lk-3__title_sm">
                        <?= Yii::t('views.profile.view', 'address'); ?>
                    </div>
                    <div class="lk-prop">
                        <?= $o_user['address']; ?>
                    </div>
                </div>
            </div>
            <div class="centered">
                <?= CHtml::link(
                    Yii::t('views.profile.view', 'link-update'),
                    array('update'),
                    array('class' => 'btn')
                ); ?>
            </div>
        </div>
    </div>
</section>