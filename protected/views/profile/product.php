<?php
/**
 * @var $a_chapter array
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
                                <?php foreach ($item['product'] as $product) { ?>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <?= CHtml::link(
                                                $product['h1_' . Yii::app()->language],
                                                array('product/view', 'id' => $product['url'])
                                            ); ?>
                                        <td><?= $product['category']['h1_' . Yii::app()->language]; ?></td>
                                        <td>
                                            <a href="javascript:" class="plus"></a>
                                            <input
                                                    type="text"
                                                    class="score"
                                                    value="1"
                                                    data-product="<?= $product['id']; ?>"
                                                    data-price="<?= round(
                                                        $product['price'] * (100 - $o_user['usertype']['discount'])
                                                        / 100,
                                                        2
                                                    ); ?>"
                                            />
                                            <a href="javascript:" class="minus"></a>
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
                                        <td><a href="javascript:" class="cart add-to-cart"></a></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="8">
                                        <a href="javascript:" class="to-order">
                                            <?= Yii::t('views.profile.product', 'link-order'); ?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php $opened = false;
                } ?>
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
                <div class="centered">
                    <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                    <a href="javascript:" class="btn submit-link">
                        <?= Yii::t('views.profile.product', 'submit'); ?>
                    </a>
                </div>
                <div class="lk-form__total">
                    <?= Yii::t('views.profile.product', 'total'); ?>:
                    <span><?= Yii::app()->numberFormatter->formatDecimal($price); ?> грн</span>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>