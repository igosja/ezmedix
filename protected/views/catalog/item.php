<?php
/**
 * @var $item Product
 */
?>
<div class="cat__i">
    <?= CHtml::link(
        '<img
            src="' . ImageIgosja::resize(isset($item['image'][0]) ? $item['image'][0]['image_id'] : 0, 280, 280) . '"
            alt="' . $item['h1_' . Yii::app()->language] . '"
        />',
        array('product/view', 'id' => $item['url']),
        array('class' => 'cat__i__img')
    ); ?>
    <span class="cat__i__title">
        <span>
            <?= $item['h1_' . Yii::app()->language]; ?>
        </span>
    </span>
    <span class="cat__i__text">
        <?= mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0, 120); ?>
    </span>
    <span class="cat__i__bot clearfix">
        <span class="cat__i__price"><?= Yii::app()->numberFormatter->formatDecimal($item['price']); ?> грн.</span>
        <?= CHtml::link(
            '',
            array('profile/product'),
            array('class' => 'cat__i__basket')
        ); ?>
        <?= CHtml::link(
            Yii::t('views.catalog.index', 'link-detail'),
            array('product/view', 'id' => $item['url']),
            array('class' => 'cat__i__link')
        ); ?>
    </span>
</div>