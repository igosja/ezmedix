<?php
/**
 * @var $a_partner array
 * @var $o_page PagePartner
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
            <div class="partners clearfix">
                <?php foreach ($a_partner as $item) { ?>
                    <div class="partners__item">
                        <h3 class="partners__item__title"><?= $item['h1_' . Yii::app()->language]; ?></h3>
                        <div class="partners__item__adress"><?= $item['address_' . Yii::app()->language]; ?></div>
                        <div class="partners__item__phones">
                            <?= nl2br($item['phone_' . Yii::app()->language]); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>