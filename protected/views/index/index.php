<?php
/**
 * @var $a_news array
 */
?>
<section class="content">
    <div class="main-slider" id="slider">
        <div class="item" style="background: url(img/m-slider.jpg) center top no-repeat;">
            <div class="wrap">
                <img src="/img/m-banner-logo.png" alt="">
                <div class="m-slider__title">Продукция для стоматологов из Канады</div>
                <div class="m-slider__text">
                    Мы поставляем нашим партнерам не просто дезинфектанты (ополаскиватели, абразивы), а УВЕРЕННОСТЬ В
                    КАЧЕСТВЕ НАШЕЙ ПРОДУКЦИИ при производстве которой все эти "мелочи" учитываются: качество сырья,
                    соблюдение технологии производства, тестирование эффективности производствадукции.
                </div>
                <div class="centered"><a href="" class="btn">Заказать продукцию</a></div>
            </div>
        </div>
        <div class="item" style="background: url(img/m-slider.jpg) center top no-repeat;">
            <div class="wrap">
                <img src="/img/m-banner-logo.png" alt="">
                <div class="m-slider__title">Продукция для стоматологов</div>
                <div class="m-slider__text">
                    Мы поставляем нашим партнерам не просто дезинфектанты (ополаскиватели, абразивы), а УВЕРЕННОСТЬ В.
                </div>
                <div class="centered"><a href="" class="btn">Заказать продукцию</a></div>
            </div>
        </div>

        <div class="item" style="background: url(img/m-slider.jpg) center top no-repeat;">
            <div class="wrap">
                <img src="/img/m-banner-logo.png" alt="">
                <div class="m-slider__title">Продукция</div>
                <div class="m-slider__text">
                    Мы поставляем нашим партнерам не просто дезинфектанты (ополаскиватели, абразивы), а УВЕРЕННОСТЬ В
                    КАЧЕСТВЕ НАШЕЙ ПРОДУКЦИИ при производстве которой все эти "мелочи" учитываются: качество сырья.
                </div>
                <div class="centered"><a href="" class="btn">Заказать продукцию</a></div>
            </div>
        </div>
    </div>
    <div class="main-cat">
        <div class="wrap">
            <h2 class="title">Каталог товаров</h2>
            <div class="cleerfix cats">
                <a href="" class="cats__i">
                    <img src="/img/cats/cat-1.png" alt="">
                    Дентальная<br/> профилактика
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-2.png" alt="">
                    Дезинфекция<br/> систем аспирации
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-3.png" alt="">
                    Дезинфекция<br/> шлангов DUWLS
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-4.png" alt="">
                    Дезинфекция<br/> поверхностей
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-5.png" alt="">
                    Дезинфекция дентального<br/> инструментария
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-6.png" alt="">
                    Стерилизация стомато<br/> инструментария
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-7.png" alt="">
                    Очистка и дезинфекция<br/> автоклава
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-8.png" alt="">
                    Дезинфекция<br/> оттисков
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-9.png" alt="">
                    Расходные<br/> материалы
                </a><a href="" class="cats__i">
                    <img src="/img/cats/cat-10.png" alt="">
                    Действующие<br/> акции
                </a>
            </div>
            <div class="btn-more__out">
                <a href="" class="btn-more">Вся продукция</a>
            </div>
            <div class="main-cat__text">
                EZMEDIX отслеживает тренды мировой стоматологии и следуя им СОЗДАЕТ СОБСТВЕННЫЕ эффективные
                композиции.<br/>
                Купить стоматологические материалы EZMEDIX можно по доступной цене и в удобной упаковке.
            </div>
        </div>
    </div>
    <div class="main-b">
        <div class="wrap">
            <div class="main-b__in">
                <div class="main-b__title">
                    EZMEDIX — производитель продуктов<br/>
                    регулярного использования<br/>
                    в дентальной медицинской практике для:
                </div>
                <ul>
                    <li><span>ДЕЗИНФЕКЦИИ</span> (инструментария, поверхностей, рук)</li>
                    <li><span>ХОЛОДНОЙ СТЕРИЛИЗАЦИИ</span></li>
                    <li><span>ПРОФИЛАКТИКТИЧЕСКОГО</span> и <span>ГИГИЕНИЧЕСКОГО УХОДА</span></li>
                    <li><span>КЛИНИНГА</span>, включая очистку от микробных биопленок (microbial biofilms),
                        присутствующих в шлангах систем водоснабжения стоматологических установок (DUWL)
                    </li>
                </ul>
                <p>Современная стоматология — высокотехнологичная и высоко-конкурентная отрасль медицины. Отрасль, в
                    которой не может быть «мелочей»: ни в предоставляемых услугах,<br/> ни в расходуемых материалах.</p>
                <p>Мы проводим: микробиологические, вирусологические, токсикологические исследования которыми готовы с
                    вами поделиться.</p>
            </div>
        </div>
    </div>
    <div class="main-news">
        <div class="wrap clearfix">
            <h2 class="title">Новости и акции:</h2>
            <div class="clearfix news">
                <?php foreach ($a_news as $item) { ?>
                    <?php if (News::TYPE_NEWS == $item['type_id']) {
                        $controller = 'news';
                    } else {
                        $controller = 'article';
                    } ?>
                    <?= CHtml::link(
                        '<img
                            src="' . ImageIgosja::resize($item['image_id'], 370, 201) . '"
                            alt="' . $item['h1_' . Yii::app()->language] . '"
                        />
                        <span class="news__i__date">' . date('d.m.Y', $item['date']) . '</span>
                        <span class="news__i__title">' . $item['h1_' . Yii::app()->language] . '</span>
                        <span class="news__i__text">' . mb_substr(strip_tags($item['text_' . Yii::app()->language]), 0,
                            350) . '</span>
                        <span class="news__i__link">' . Yii::t('views.index.index', 'link-detail') . '</span>',
                        array($controller . '/view', 'id' => $item['url']),
                        array('class' => 'news__i')
                    ) ?>
                <?php } ?>
            </div>
            <div class="news-more">
                <?= CHtml::link(
                    Yii::t('views.index.index', 'all-news'),
                    array('news/index'),
                    array('class' => 'btn-more')
                ); ?>
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