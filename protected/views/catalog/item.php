<?php
/**
 * @var $item Product
 */
?>
<?= CHtml::link(
    '<span class="cat__i__img">
        <img
            src="' . ImageIgosja::resize(isset($item['image'][0]) ? $item['image'][0]['image_id'] : 0, 280, 280) . '"
            alt="' . $item['h1_' . Yii::app()->language] . '"
        />
    </span>
    <span class="cat__i__title">
    <span>
    ' . $item['h1_' . Yii::app()->language] . '
    </span>
    </span>
    <span class="cat__i__text">
    ' . mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0, 120) . '
    </span>
    <span class="cat__i__bot">
    <span class="cat__i__link">
    ' . Yii::t('views.catalog.index', 'link-detail') . '
    </span>
    </span>',
    array('product/view', 'id' => $item['url']),
    array('class' => 'cat__i')
); ?>