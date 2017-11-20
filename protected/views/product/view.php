<?php
/**
 * @var $a_product array
 * @var $o_product Product
 * @var $o_user User
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
                <div class="clearfix">
                    <div class="prod__left">
                        <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
                        <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
                        <div class="slider-out">
                            <div class="slider clearfix">
                                <?php foreach ($o_product['image'] as $item) { ?>
                                    <div>
                                        <a href="<?= ImageIgosja::resize($item['image_id'], 700, 700); ?>"
                                           data-lightbox="1">
                                            <img
                                                    alt="<?= $o_product['h1_' . Yii::app()->language]; ?>"
                                                    src="<?= ImageIgosja::resize($item['image_id'], 580, 580); ?>"
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
                        <div class="prod__title">
                            <?= Yii::t('views.product.views', 'parameter'); ?>
                        </div>
                        <?= $o_product['parameter_' . Yii::app()->language]; ?>
                        <div class="prod__table">
                            <?php if ($o_product['composition_' . Yii::app()->language]) { ?>
                                <div class="prod__table__i"><?= Yii::t('views.product.views', 'composition'); ?></div>
                                <?= $o_product['composition_' . Yii::app()->language]; ?>
                            <?php } ?>
                            <?php if ($o_product['release_form_' . Yii::app()->language]) { ?>
                                <div class="prod__table__i"><?= Yii::t('views.product.views', 'release-form'); ?></div>
                                <?= $o_product['release_form_' . Yii::app()->language]; ?>
                            <?php } ?>
                            <?php if ($o_product['shelf_life_' . Yii::app()->language]) { ?>
                                <div class="prod__table__i"><?= Yii::t('views.product.views', 'shelf-life'); ?></div>
                                <?= $o_product['shelf_life_' . Yii::app()->language]; ?>
                            <?php } ?>
                            <?php if ($o_product['attention_' . Yii::app()->language]) { ?>
                                <div class="prod__table__i"><?= Yii::t('views.product.views', 'attention'); ?></div>
                                <?= $o_product['attention_' . Yii::app()->language]; ?>
                            <?php } ?>
                        </div>
                        <?php if (Yii::app()->user->isGuest) { ?>
                            <div class="prod__price">
                                <?= Yii::app()->numberFormatter->formatDecimal($o_product['price']); ?> грн.
                            </div>
                        <?php } else { ?>
                            <div class="prod__price">
                                <?= Yii::app()->numberFormatter->formatDecimal(
                                    round(
                                        $o_product['price'] * (100 - $o_user['usertype']['discount']) / 100,
                                        2
                                    )
                                ); ?>
                                грн.
                            </div>
                            <div class="prod__old-price">
                                <?= Yii::app()->numberFormatter->formatDecimal($o_product['price']); ?> грн.
                            </div>
                        <?php } ?>
                        <?= CHtml::link(
                            Yii::t('views.product.view', 'order')
                            . '<img src="/img/cart.png" alt="'
                            . Yii::t('views.product.view', 'order')
                            . '">',
                            array('profile/product'),
                            array('class' => 'prod__btn')
                        ); ?>
                        <p style="text-align: center;">
                            <?= Yii::t('views.product.views', 'want-free'); ?>
                            <a href="javascript:"><?= Yii::t('views.product.views', 'want-free-more'); ?></a>
                        </p>
                    </div>
                </div>

                <div class="prod__bottom">
                    <div class="prod__title"><?= Yii::t('views.product.views', 'features'); ?></div>
                    <?= $o_product['text_' . Yii::app()->language]; ?>
                    <br />
                    <br />
                    <?php if ($o_product['pdf_id']) { ?>
                        <div class="prod__title"><?= Yii::t('views.product.views', 'documents'); ?></div>
                        <a href="<?= $o_product['pdf']['url']; ?>" class="prod__intruction" target="_blank">
                            <?= Yii::t('views.product.view', 'instruction'); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($a_product) { ?>
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
        <?php } ?>
    </div>
</section>