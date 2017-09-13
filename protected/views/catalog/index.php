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
        <div class="wrap">
            <div class="cat clearfix">
                <div class="cat__left">
                    <a href="javascript:;" class="show-b active">Продукция</a>
                    <div class="hidden-b">
                        <ul class="cat-menu">
                            <li>
                                <a href="">Дентальная профилактика</a>
                            </li>
                            <li>
                                <a href="">Дезинфекция систем аспирации</a>
                            </li>
                            <li>
                                <a href="">Дезинфекция шлангов DUWLS</a>
                            </li>
                            <li>
                                <a href="">Дезинфекция поверхностей</a>
                            </li>
                            <li>
                                <a href="">Дезинфекция дентального инструментария</a>
                            </li>
                            <li>
                                <a href="">Стерилизация стомато инструментария</a>
                            </li>
                            <li>
                                <a href="">Очистка и дезинфекция автоклава</a>
                            </li>
                            <li>
                                <a href="">Дезинфекция оттисков</a>
                            </li>
                            <li>
                                <a href="">Расходные материалы</a>
                            </li>
                            <li>
                                <a href="">Действующие акции</a>
                            </li>
                        </ul>
                    </div>
                    <a href="javascript:" class="show-b active">Фильтр</a>
                    <div class="hidden-b">
                        <ul class="cat-radio">
                            <li>
                                <div class="checkboxes">
                                    <input id="something-1" type="checkbox" name="something" value="something-1">
                                    <label for="something-1">Профилактика</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkboxes">
                                    <input id="something-2" type="checkbox" name="something" value="something-2">
                                    <label for="something-2">Дезинфекция</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkboxes">
                                    <input id="something-3" type="checkbox" name="something" value="something-3">
                                    <label for="something-3">Инструментарий</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkboxes">
                                    <input id="something-4" type="checkbox" name="something" value="something-4">
                                    <label for="something-4">Стерилизация</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkboxes">
                                    <input id="something-5" type="checkbox" name="something" value="something-5">
                                    <label for="something-5">Очистка</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="cat__right">
                    <div class="clearfix">
                        <div class="cat__items clearfix">
                            <a href="index-product.html" class="cat__i">
                                <span class="cat__i__img">
                                    <img src="/img/trash/catalog-1.jpg" alt="">
                                </span>
                                <span class="cat__i__title"><span>Дентальная<br/>профилактика</span></span>
                                <span class="cat__i__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                <span class="cat__i__bot">
                                <span class="cat__i__link">Подробнее</span>
                            </span>

                            </a>

                            <a href="index-product.html" class="cat__i">
											<span class="cat__i__img">
												<img src="/img/trash/catalog-2.jpg" alt="">
											</span>
                                <span class="cat__i__title"><span>Дентальная профилактика</span></span>
                                <span class="cat__i__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                <span class="cat__i__bot">
												<span class="cat__i__link">Подробнее</span>
											</span>
                            </a>

                            <a href="index-product.html" class="cat__i">
											<span class="cat__i__img">
												<img src="/img/trash/catalog-3.jpg" alt="">
											</span>
                                <span class="cat__i__title"><span>Дентальная<br/>профилактика</span></span>
                                <span class="cat__i__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                <span class="cat__i__bot">
												<span class="cat__i__link">Подробнее</span>
											</span>
                            </a>

                            <a href="index-product.html" class="cat__i">
											<span class="cat__i__img">
												<img src="/img/trash/catalog-4.jpg" alt="">
											</span>
                                <span class="cat__i__title"><span>Дентальная<br/>профилактика</span></span>
                                <span class="cat__i__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                <span class="cat__i__bot">
												<span class="cat__i__link">Подробнее</span>
											</span>
                            </a>

                            <a href="index-product.html" class="cat__i">
											<span class="cat__i__img">
												<img src="/img/trash/catalog-5.jpg" alt="">
											</span>
                                <span class="cat__i__title"><span>Дентальная<br/>профилактика</span></span>
                                <span class="cat__i__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                <span class="cat__i__bot">
												<span class="cat__i__link">Подробнее</span>
											</span>
                            </a>

                            <a href="index-product.html" class="cat__i">
											<span class="cat__i__img">
												<img src="/img/trash/catalog-6.jpg" alt="">
											</span>
                                <span class="cat__i__title"><span>Дентальная<br/>профилактика</span></span>
                                <span class="cat__i__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                <span class="cat__i__bot">
												<span class="cat__i__link">Подробнее</span>
											</span>
                            </a>
                        </div>
                    </div>
                    <div class="centered">
                        <a href="" class="btn">Загрузить еще</a>
                    </div>
                    <div class="pager">
                        <a href="" class="pager__prev pager-a"></a>
                        <span>1</span>
                        <a href="">2</a>
                        <a href="">3</a>
                        <a href="">4</a>
                        <a href="">5</a>
                        <a href="" class="pager__next pager-a"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gr-text">
        <div class="wrap">
            <h3 class="gr-text__title">EZMEDIX — производитель продуктов регулярного использования в дентальной
                медицинской практике для:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida
                dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis
                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus
                pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
            <p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus
                sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum
                laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
            <p>Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus
                sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum
                laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar
                tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam
                fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget
                odio.</p>
        </div>
    </div>
</section>