<?php
/**
 * @var $a_chapter array
 */
?>

<section class="content">
    <div class="in-page">
        <div class="in-page__top">
            <div class="wrap">
                <?= $this->renderPartial('/include/bread'); ?>
                <h1 class="m-title">
                    <?= Yii::t('views.profile.product', 'h1'); ?>
                </h1>
            </div>

        </div>
        <div class="wrap">
            <div class="acrdn acdn_faq">
                <?php foreach ($a_chapter as $item) { ?>
                    <div class="acrdn-item opened">
                        <a href="javascript:" class="acrdn-item-head">
                            <?= $item['chapter']['h1_' . Yii::app()->language]; ?>
                        </a>
                        <div class="acrdn-item-body">
                            <table class="table-products">
                                <tr>
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                    <th>Скидка</th>
                                    <th>Итого</th>
                                    <th>В корзину</th>
                                </tr>
                                <?php foreach ($item['product'] as $product) { ?>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <?= CHtml::link(
                                                $product['h1_' . Yii::app()->language],
                                                array('product/view', 'id' => $product['url'])
                                            ); ?>
                                        <td><?= $product['category']['h1_' . Yii::app()->language]; ?></td>
                                        <td>
                                            <a href="javascript:" class="plus"></a>
                                            <input type="text" class="score" value="1">
                                            <a href="javascript:" class="minus"></a>
                                        </td>
                                        <td><?= Yii::app()->numberFormatter->formatDecimal($product['price']); ?> грн</td>
                                        <td>2%</td>
                                        <td>450 грн</td>
                                        <td><a href="javascript:" class="cart"></a></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="8">
                                        <a href="javascript:">Оформить заказ</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <div class="lk-form clearfix">
            <div class="wrap">
                <h2 class="m-title">
                    Оформить заказ
                </h2>
                <div class="lk-form__title">Анатолий Петров</div>
                <form action="">

                    <div class="clearfix">
                        <div class="lk-3">
                            <div class="lk-3__title lk-3__title_sm lk-3__title_nm">Телефон</div>
                            <input type="tel" class="log-input">
                        </div>

                        <div class="lk-3">
                            <div class="lk-3__title lk-3__title_sm lk-3__title_nm">Email</div>
                            <input type="email" class="log-input">
                        </div>

                        <div class="lk-3">
                            <div class="lk-3__title lk-3__title_sm lk-3__title_nm">Как доставить?</div>
                            <div class="jqui-select">
                                <select name="" id="">
                                    <option value="">Служба доставки 1</option>
                                    <option value="">Служба доставки 2</option>
                                    <option value="">Служба доставки 3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="lk-3__title lk-3__title_sm lk-3__title_nm">Комментарий</div>
                    <textarea class="lk-form__textarea"></textarea>
                    <div class="centered">
                        <a href="javasctipt:;" class="btn">Заказать</a>
                    </div>
                    <div class="lk-form__total">Итоговая цена: <span>397 599 грн</span></div>


                </form>

            </div>
        </div>

    </div>


</section>