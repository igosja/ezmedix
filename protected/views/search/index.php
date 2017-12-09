<?php
/**
 * @var $a_chapter array
 * @var $a_news    array
 * @var $a_product array
 * @var $o_page    array
 */
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= $o_page['h1_' . Yii::app()->language]; ?>
                </h1>
            </div>
        </div>
        <div class="wrap">
            <div class="clearfix news item-div">
                <?php foreach ($a_product as $item) { ?>
                    <?= $this->renderPartial('item', array('item' => $item, 'model' => 'product')); ?>
                <?php } ?>
                <?php foreach ($a_chapter as $item) { ?>
                    <?= $this->renderPartial('item', array('item' => $item, 'model' => 'chapter')); ?>
                <?php } ?>
                <?php foreach ($a_news as $item) { ?>
                    <?= $this->renderPartial('item', array('item' => $item, 'model' => 'news')); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>