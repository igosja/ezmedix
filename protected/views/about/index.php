<?php
/**
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
    </div>
</section>