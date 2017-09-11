<?php
/**
 * @var $a_news array
 * @var $a_project_1 array
 * @var $a_project_2 array
 * @var $a_project_3 array
 * @var $a_slide array
 * @var $o_page PageMain
 */
?>
<section class="content">
    <div class="main-slider" id="slider">
        <?php foreach ($a_slide as $item) { ?>
            <div class="item">
                <?php if (isset($item->image->url)) { ?>
                    <img src="<?= $item->image->url; ?>" alt="">
                <?php } ?>
                <div class="main-slider__text">
                    <?= Yii::t('views.index.index', 'slider-1'); ?><br/>
                    <span style="color:#ffcf29"><?= Yii::t('views.index.index', 'slider-2'); ?></span>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="main-b__about">
        <div class="wrap">
            <h1 class="b-title"><?= $o_page['h1_' . Yii::app()->language]; ?></h1>
            <?= $o_page['text_1_' . Yii::app()->language]; ?>
            <?php if ($o_page['video']) { ?>
                <iframe src="https://www.youtube.com/embed/<?= $o_page['video']; ?>" frameborder="0"
                        allowfullscreen></iframe>
            <?php } ?>
        </div>
    </div>
    <div class="main-b__btns">
        <div class="wrap clearfix">
            <?= CHtml::link(
                '<span></span>' . Yii::t('views.index.index', 'link-advantage'),
                array('advantage/index'),
                array('class' => 'main-b__btns__btn clearfix')
            ) ?>
            <?= CHtml::link(
                '<span></span>' . Yii::t('views.index.index', 'link-consult'),
                array('consult/index'),
                array('class' => 'main-b__btns__btn clearfix')
            ) ?>
            <?= CHtml::link(
                '<span></span>' . Yii::t('views.index.index', 'link-why'),
                array('why/index'),
                array('class' => 'main-b__btns__btn clearfix')
            ) ?>
        </div>
    </div>
    <div class="main-b__proj">
        <div class="wrap clearfix">
            <h2 class="b-title"><?= Yii::t('views.index.index', 'project'); ?></h2>
            <div class="proj-b clearfix">
                <?php foreach ($a_project_1 as $item) { ?>
                    <?= CHtml::link(
                        '<img src="' . ImageIgosja::resize($item['image_id'], 600, 380) . '" alt="' . $item['projectcategory']['name_' . Yii::app()->language] . '">
                        <span class="proj-b__i__info">
                            <span><small>#</small>' . $item['projectcategory']['name_' . Yii::app()->language] . '</span>
                        </span>',
                        array('project/index', 'id' => $item['projectcategory']['url']),
                        array('class' => 'proj-b__i')
                    ); ?>
                <?php } ?>
                <?php foreach ($a_project_2 as $item) { ?>
                    <?= CHtml::link(
                        '<img src="' . ImageIgosja::resize($item['image_id'], 600, 380) . '" alt="' . $item['projectcategory']['name_' . Yii::app()->language] . '">
                        <span class="proj-b__i__info">
                            <span><small>#</small>' . $item['projectcategory']['name_' . Yii::app()->language] . '</span>
                        </span>',
                        array('project/index', 'id' => $item['projectcategory']['url']),
                        array('class' => 'proj-b__i')
                    ); ?>
                <?php } ?>
                <?php foreach ($a_project_3 as $item) { ?>
                    <?= CHtml::link(
                        '<img src="' . ImageIgosja::resize($item['image_id'], 600, 380) . '" alt="' . $item['projectcategory']['name_' . Yii::app()->language] . '">
                        <span class="proj-b__i__info">
                            <span><small>#</small>' . $item['projectcategory']['name_' . Yii::app()->language] . '</span>
                        </span>',
                        array('project/index', 'id' => $item['projectcategory']['url']),
                        array('class' => 'proj-b__i')
                    ); ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="main-b__info">
        <div class="wrap clearfix">
            <h2 class="b-title"><?= Yii::t('views.index.index', 'info'); ?></h2>
            <div class="art clearfix">
                <?php foreach ($a_news as $item) { ?>
                    <?= $this->renderPartial('/news/item', array('item' => $item)); ?>
                <?php } ?>
            </div>
            <div class="centered">
                <?= CHtml::link(
                    '<span></span>' . Yii::t('views.index.index', 'link-all'),
                    array('news/index'),
                    array('class' => 'art__more')
                ) ?>
            </div>
        </div>
    </div>
    <div class="grey-bg main-b__text">
        <div class="wrap">
            <?= $o_page['text_2_' . Yii::app()->language]; ?>
        </div>
    </div>
</section>
