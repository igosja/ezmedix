<?php

/**
 * @var $model string
 * @var $item array
 */

if ('product' == $model) {
    $img = isset($item['image'][0]) ? $item['image'][0]['image_id'] : 0;
    $url = 'product/view';
} elseif ('news' == $model) {
    $img = $item['image_id'];
    $url = 'news/view';
} else {
    $img = $item['image_id'];
    $url = 'catalog/index';
}

?>
<?= CHtml::link(
    '<img
        src="' . ImageIgosja::resize($img, 370, 201) . '"
        alt="' . $item['h1_' . Yii::app()->language] . '"
    />
    <span class="news__i__title">' . $item['h1_' . Yii::app()->language] . '</span>
    <span class="news__i__text">' . mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0, 350) . '</span>
    <span class="news__i__link">' . Yii::t('views.search.item', 'link-detail') . '</span>',
    array($url, 'id' => $item['url']),
    array('class' => 'news__i')
); ?>