<?php

/**
 * @var $a_cart array
 * @var $o_user User
 */

?>
<div class="table-products__out">
    <?php if ($a_cart) { ?>
        <table class="table-products table-products_b">
            <tr>
                <th><?= Yii::t('views.profile.cart', 'product'); ?></th>
                <th><?= Yii::t('views.profile.cart', 'quantity'); ?></th>
                <th><?= Yii::t('views.profile.cart', 'price'); ?></th>
                <th><?= Yii::t('views.profile.cart', 'discount'); ?></th>
                <th><?= Yii::t('views.profile.cart', 'total'); ?></th>
            </tr>
            <?php foreach ($a_cart as $item) { ?>
                <tr>
                    <td><?= $item['product']['h1_' . Yii::app()->language]; ?></td>
                    <td><?= $item['quantity']; ?></td>
                    <td><?= Yii::app()->numberFormatter->formatDecimal($item['product']['price']); ?> грн</td>
                    <td><?= Yii::app()->numberFormatter->formatDecimal($o_user['usertype']['discount']); ?>%</td>
                    <td>
                        <?= round(
                            $item['product']['price'] * (100 - $o_user['usertype']['discount'])
                            / 100,
                            2
                        ); ?> грн
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>