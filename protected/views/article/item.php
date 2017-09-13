<?php
/**
 * @var $item News
 */
?>
<?= CHtml::link(
    '<img
        src="' . ImageIgosja::resize($item['image_id'], 370, 201) . '"
        alt="' . $item['h1_' . Yii::app()->language] . '"
    />
    <span class="news__i__date">' . date('d.m.Y', $item['date']) . '</span>
    <span class="news__i__title">' . $item['h1_' . Yii::app()->language] . '</span>
    <span class="news__i__text">' . mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0, 350) . '</span>
    <span class="news__i__link">' . Yii::t('views.article.item', 'link-detail') . '</span>',
    array('article/view', 'id' => $item['url']),
    array('class' => 'news__i')
); ?>