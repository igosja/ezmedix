<?php
/**
 * @var $a_cart    array
 * @var $a_chapter array
 * @var $count     integer
 * @var $form      CActiveForm
 * @var $model     Order
 * @var $o_user    array
 * @var $price     integer
 */
$opened = true;
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= Yii::t('views.profile.product', 'h1'); ?>
                </h1>
            </div>
        </div>
        <div class="wrap">
            <div style="margin-bottom: 40px;">
                <?= Yii::t('views.profile.product', 'text'); ?>
            </div>
            <div class="acrdn acdn_faq">
                <?php foreach ($a_chapter as $item) { ?>
                    <div class="acrdn-item <?php if ($opened) { ?>opened<?php } ?>">
                        <a href="javascript:" class="acrdn-item-head">
                            <?= $item['chapter']['h1_' . Yii::app()->language]; ?>
                        </a>
                        <div class="acrdn-item-body">
                            <table class="table-products">
                                <tr>
                                    <th>№</th>
                                    <th><?= Yii::t('views.profile.product', 'th-name'); ?></th>
                                    <th><?= Yii::t('views.profile.product', 'th-category'); ?></th>
                                    <th><?= Yii::t('views.profile.product', 'th-quantity'); ?></th>
                                    <th><?= Yii::t('views.profile.product', 'th-price'); ?></th>
                                    <th><?= Yii::t('views.profile.product', 'th-discount'); ?></th>
                                    <th><?= Yii::t('views.profile.product', 'th-total'); ?></th>
                                    <th><?= Yii::t('views.profile.product', 'th-cart'); ?></th>
                                </tr>
                                <?php $i = 1; ?>
                                <?php foreach ($item['product'] as $product) { ?>
                                    <?php

                                    $css = '';
                                    $value = 1;
                                    foreach ($a_cart as $cart_item) {
                                        if ($cart_item['product_id'] == $product['id']) {
                                            $value = $cart_item['quantity'];
                                            $css = 'active';
                                        }
                                    }

                                    ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td>
                                            <?= CHtml::link(
                                                $product['h1_' . Yii::app()->language],
                                                array('product/view', 'id' => $product['url'])
                                            ); ?>
                                        <td><?= $product['category']['h1_' . Yii::app()->language]; ?></td>
                                        <td>
                                            <div class="order-cnt clearfix">
                                                <a href="javascript:" class="plus"></a>
                                                <input
                                                        type="text"
                                                        class="score"
                                                        value="<?= $value; ?>"
                                                        data-product="<?= $product['id']; ?>"
                                                        data-price="<?= round(
                                                            $product['price'] * (100 - $o_user['usertype']['discount'])
                                                            / 100,
                                                            2
                                                        ); ?>"
                                                />
                                                <a href="javascript:" class="minus"></a>
                                            </div>
                                        </td>
                                        <td>
                                            <?= Yii::app()->numberFormatter->formatDecimal(
                                                $product['price']
                                            ); ?>
                                            грн
                                        </td>
                                        <td>
                                            <?= Yii::app()->numberFormatter->formatDecimal(
                                                $o_user['usertype']['discount']
                                            ); ?>%
                                        </td>
                                        <td class="td-total">
                                            <?= Yii::app()->numberFormatter->formatDecimal(
                                                round(
                                                    $product['price'] * (100 - $o_user['usertype']['discount']) / 100,
                                                    2
                                                )
                                            ); ?>
                                            грн
                                        </td>
                                        <td><a href="javascript:" class="cart <?= $css; ?> add-to-cart"></a></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php } ?>
                                <tr>
                                    <td colspan="8">
                                        <strong class="total">
                                            <?= Yii::t('views.profile.product', 'table-your-order'); ?>
                                            <span class="cart-total-count"><?= $count; ?> тов</span>
                                        </strong>
                                        <strong class="total">
                                            <?= Yii::t('views.profile.product', 'table-your-sum'); ?>
                                            <span class="cart-total-price"><?= Yii::app()->numberFormatter->formatDecimal($price); ?> грн</span>
                                        </strong>
                                        <a href="javascript:" class="to-order">
                                            <?= Yii::t('views.profile.product', 'link-order'); ?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php $opened = false; ?>
                <?php } ?>
            </div>
        </div>
        <div class="lk-form clearfix">
            <div class="wrap">
                <h2 class="m-title">
                    <?= Yii::t('views.profile.product', 'h2-order'); ?>
                </h2>
                <div class="lk-form__title"><?= $o_user['name']; ?></div>
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                )); ?>
                <div class="clearfix">
                    <div class="lk-3">
                        <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                            <?= Yii::t('views.profile.product', 'label-phone'); ?>
                        </div>
                        <?= $form->textField($model, 'phone', array('class' => 'log-input phone_mask')); ?>
                        <?= $form->error($model, 'phone'); ?>
                    </div>
                    <div class="lk-3">
                        <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                            <?= Yii::t('views.profile.product', 'label-email'); ?>
                        </div>
                        <?= $form->textField($model, 'email', array('class' => 'log-input')); ?>
                        <?= $form->error($model, 'email'); ?>
                    </div>
                    <div class="lk-3">
                        <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                            <?= Yii::t('views.profile.product', 'label-shipping'); ?>
                        </div>
                        <div class="jqui-select">
                            <?= $form->dropDownList(
                                $model,
                                'shipping_id',
                                CHtml::listData(Shipping::model()->findAll(), 'id', 'h1_' . Yii::app()->language)
                            ); ?>
                        </div>
                        <?= $form->error($model, 'shipping_id'); ?>
                    </div>
                </div>
                <div class="lk-3__title lk-3__title_sm lk-3__title_nm">
                    <?= Yii::t('views.profile.product', 'label-comment'); ?>
                </div>
                <?= $form->textArea($model, 'comment', array('class' => 'lk-form__textarea')); ?>
                <?= $form->error($model, 'comment'); ?>
                <div class="lk-form__total">
                    <strong>
                        <?= Yii::t('views.profile.product', 'your-order'); ?>
                        <span class="cart-total-count"><?= $count; ?> тов</span>
                    </strong>
                    <strong>
                        <?= Yii::t('views.profile.product', 'total'); ?>
                        <span class="cart-total-price"><?= Yii::app()->numberFormatter->formatDecimal($price); ?> грн</span>
                    </strong>
                </div>
                <?php $this->renderPartial('cart', array('a_cart' => $a_cart, 'o_user' => $o_user)); ?>
                <div class="centered">
                    <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                    <a href="javascript:" class="btn submit-link">
                        <?= Yii::t('views.profile.product', 'submit'); ?>
                    </a>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>