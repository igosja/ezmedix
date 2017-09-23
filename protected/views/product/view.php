<?php
/**
 * @var $a_product array
 * @var $o_product Product
 */
$parameter = $o_product['parameter_' . Yii::app()->language];
$parameter = nl2br($parameter);
$parameter = explode('<br>', $parameter);
?>
<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= $o_product['h1_' . Yii::app()->language]; ?>
                </h1>
            </div>
        </div>
        <div class="wrap">
            <div class="prod clearfix">
                <div class="prod__left">
                    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
                    <script type="text/javascript"
                            src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
                    <div class="slider-out">
                        <div class="slider clearfix">
                            <?php foreach ($o_product['image'] as $item) { ?>
                                <div>
                                    <a href="<?= ImageIgosja::resize($item['image_id'], 700, 700); ?>"
                                       data-lightbox="1">
                                        <img
                                                src="<?= ImageIgosja::resize($item['image_id'], 580, 580); ?>"
                                                alt="<?= $o_product['h1_' . Yii::app()->language]; ?>"
                                        />
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <a href="javascript:" class="next"></a>
                        <a href="javascript:" class="prev"></a>
                    </div>
                    <div class="slider-nav">
                        <?php foreach ($o_product['image'] as $item) { ?>
                            <div>
                                <img
                                        src="<?= ImageIgosja::resize($item['image_id'], 580, 580); ?>"
                                        alt="<?= $o_product['h1_' . Yii::app()->language]; ?>"
                                />
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="prod__right">
                    <div class="clearfix">
                        <?= CHtml::link(
                            Yii::t('views.product.view', 'order')
                            . '<img src="/img/cart.png" alt="'
                            . Yii::t('views.product.view', 'order')
                            . '">',
                            array('profile/product'),
                            array('class' => 'prod__btn')
                        ); ?>
                        <?php if ($o_product['pdf_id']) { ?>
                            <a href="<?= $o_product['pdf']['url']; ?>" class="prod__intruction">
                                <?= Yii::t('views.product.view', 'instruction'); ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="prod__table">
                        <div class="prod__table__title">
                            <?= Yii::t('views.product.views', 'parameter'); ?>
                        </div>
                        <?php foreach ($parameter as $item) { ?>
                            <div class="prod__table__i"><?= $item; ?></div>
                        <?php } ?>
                    </div>
                    <?= $o_product['text_' . Yii::app()->language]; ?>
                </div>
            </div>
        </div>
        <div class="gr-text gr-text_prod">
            <div class="wrap">
                <div class="prod-bot">
                    <h2 class="prod-bot__title"><?= Yii::t('views.product.views', 'category-product'); ?></h2>
                    <div class="owl-carousel prod-more">
                        <?php foreach ($a_product as $item) { ?>
                            <div class="item">
                                <?= CHtml::link(
                                    '<img
                                        src="' . ImageIgosja::resize(isset($item['image'][0]) ? $item['image'][0]['image_id'] : 0, 200, 200) . '"
                                        alt="' . $item['h1_' . Yii::app()->language] . '">
                                    <span>' . $item['h1_' . Yii::app()->language] . '</span>
                                    <small>' . Yii::t('views.product.views', 'link-detail') . '</small>',
                                    array('view', 'id' => $item['url'])
                                ); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>