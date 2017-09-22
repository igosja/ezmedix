<?php
/**
 * @var $a_order array
 */
$opened = true;
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= Yii::t('views.profile.order', 'h1'); ?>
                </h1>
            </div>
        </div>
        <div class="wrap">
            <div class="acrdn acdn_faq">
                <?php foreach ($a_order as $item) { ?>
                    <div class="acrdn-item <?php if ($opened) { ?>opened<?php } ?>">
                        <a href="javascript:" class="acrdn-item-head">
                            <?= Yii::app()->dateFormatter->formatDateTime($item['date'], 'long', false); ?>
                            <span>
                                <?= Yii::t('views.profile.order', 'total-price'); ?>
                                <?= Yii::app()->numberFormatter->formatDecimal($item['total']); ?>
                                грн
                            </span>
                        </a>
                        <div class="acrdn-item-body">
                            <table>
                                <tr>
                                    <th>№</th>
                                    <th><?= Yii::t('views.profile.order', 'th-name'); ?></th>
                                    <th><?= Yii::t('views.profile.order', 'th-category'); ?></th>
                                    <th><?= Yii::t('views.profile.order', 'th-quantity'); ?></th>
                                    <th><?= Yii::t('views.profile.order', 'th-price'); ?></th>
                                    <th><?= Yii::t('views.profile.order', 'th-discount'); ?></th>
                                    <th><?= Yii::t('views.profile.order', 'th-total'); ?></th>
                                </tr>
                                <?php foreach ($item['product'] as $product) { ?>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="">ZZ BUFF</a></td>
                                        <td><?= $product['category_' . Yii::app()->language]; ?></td>
                                        <td><?= $product['quantity']; ?></td>
                                        <td><?= Yii::app()->numberFormatter->formatDecimal($product['price']); ?> грн</td>
                                        <td><?= Yii::app()->numberFormatter->formatDecimal($product['discount']); ?>%</td>
                                        <td><?= Yii::app()->numberFormatter->formatDecimal($product['total']); ?> грн</td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="7">
                                        <?= Yii::t('views.profile.order', 'total-price'); ?>
                                        <span>
                                            <?= Yii::app()->numberFormatter->formatDecimal($item['total']); ?>
                                            грн
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php $opened = false;
                } ?>
            </div>
        </div>
    </div>
</section>