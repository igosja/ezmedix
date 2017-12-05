<?php

/**
 * @var $a_cart array
 * @var $o_user User
 */

?>
<div class="table-products__out">
    <table class="table-products table-products_b">
        <tr>
            <th>Товар</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Скидка</th>
            <th>Сумма</th>
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
</div>