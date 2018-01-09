<?php
/**
 * @var $a_chapter  array
 * @var $a_filter   array
 * @var $a_product  array
 * @var $more       boolean
 * @var $o_chapter  Chapter
 * @var $o_page     PageCatalog
 * @var $offset     integer
 * @var $page       integer
 * @var $page_first integer
 * @var $page_last  integer
 * @var $page_next  integer
 * @var $page_prev  integer
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
                    <a href="javascript:" class="show-b active">
                        <?= Yii::t('views.catalog.index', 'product'); ?>
                    </a>
                    <div class="hidden-b">
                        <ul class="cat-menu">
                            <?php
                            foreach ($a_chapter as $item) {
                                if ($item['url'] == Yii::app()->request->getQuery('id')) {
                                    $class = 'strong';
                                } else {
                                    $class = '';
                                }
                                ?>
                                <li>
                                    <?= CHtml::link(
                                        $item['h1_' . Yii::app()->language],
                                        array('index', 'id' => $item['url']),
                                        array('class' => $class)
                                    ); ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <a href="javascript:" class="show-b active">
                        <?= Yii::t('views.catalog.index', 'filter'); ?>
                    </a>
                    <div class="hidden-b">
                        <form method="GET">
                            <ul class="cat-radio">
                                <?php foreach ($a_filter as $item) { ?>
                                    <li>
                                        <div class="checkboxes">
                                            <input
                                                    id="filter-<?= $item['id']; ?>"
                                                    type="checkbox"
                                                    name="filter[]"
                                                    value="<?= $item['id']; ?>"
                                                    <?php if (in_array($item['id'], Yii::app()->request->getQuery('filter', array()))) { ?>
                                                        checked
                                                    <?php } ?>
                                            >
                                            <label for="filter-<?= $item['id']; ?>">
                                                <?= $item['h1_' . Yii::app()->language]; ?>
                                            </label>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="cat__right">
                    <?php if ($o_chapter) { ?>
                        <h1 class="cat__title">
                            <span>
                                <?= $o_chapter['h1_' . Yii::app()->language]; ?>
                            </span>
                        </h1>
                        <?php if (isset($o_chapter['image_big']['url'])) { ?>
                            <div class="cat-img">
                                <img
                                    src="<?= ImageIgosja::resize($o_chapter['image_id_big'], 940, 238); ?>"
                                    alt="<?= $o_chapter['h1_' . Yii::app()->language]; ?>"
                                />
                            </div>
                        <?php } ?>
                        <p class="cat-text">
                            <?= $o_chapter['text_' . Yii::app()->language]; ?>
                        </p>
                    <?php } else { ?>
                        <h1 class="cat__title">
                            <span>
                                <?= $o_page['h1_' . Yii::app()->language]; ?>
                            </span>
                        </h1>
                    <?php } ?>
                    <div class="clearfix">
                        <div class="cat__items clearfix item-div">
                            <?php foreach ($a_product as $item) { ?>
                                <?= $this->renderPartial('item', array('item' => $item)); ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($more) { ?>
                        <div class="centered">
                            <a
                                    href="javascript:"
                                    class="btn load-more"
                                    data-type="catalog"
                                    data-id="<?= Yii::app()->request->getQuery('id'); ?>"
                                    data-offset="<?= $offset; ?>"
                                    data-filter="<?= implode(',', Yii::app()->request->getQuery('filter', array())); ?>"
                            >
                                <?= Yii::t('views.catalog.index', 'link-more'); ?>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="pager">
                        <?php if (Yii::app()->request->getQuery('filter')) { ?>
                            <?php if ($page_prev) { ?>
                                <?= CHtml::link(
                                    '',
                                    array('index', 'id' => Yii::app()->request->getQuery('id'), 'page' => $page_prev, 'filter' => Yii::app()->request->getQuery('filter')),
                                    array('class' => 'pager__prev pager-a')
                                ); ?>
                            <?php } ?>
                            <?php for ($i = $page_first; $i <= $page_last; $i++) { ?>
                                <?php if ($page == $i) { ?>
                                    <span><?= $i; ?></span>
                                <?php } else { ?>
                                    <?= CHtml::link($i, array('index', 'id' => Yii::app()->request->getQuery('id'), 'page' => $i, 'filter' => Yii::app()->request->getQuery('filter'))); ?>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($page_next) { ?>
                                <?= CHtml::link(
                                    '',
                                    array('index', 'id' => Yii::app()->request->getQuery('id'), 'page' => $page_next, 'filter' => Yii::app()->request->getQuery('filter')),
                                    array('class' => 'pager__next pager-a')
                                ); ?>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if ($page_prev) { ?>
                                <?= CHtml::link(
                                    '',
                                    array('index', 'id' => Yii::app()->request->getQuery('id'), 'page' => $page_prev),
                                    array('class' => 'pager__prev pager-a')
                                ); ?>
                            <?php } ?>
                            <?php for ($i = $page_first; $i <= $page_last; $i++) { ?>
                                <?php if ($page == $i) { ?>
                                    <span><?= $i; ?></span>
                                <?php } else { ?>
                                    <?= CHtml::link($i, array('index', 'id' => Yii::app()->request->getQuery('id'), 'page' => $i)); ?>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($page_next) { ?>
                                <?= CHtml::link(
                                    '',
                                    array('index', 'id' => Yii::app()->request->getQuery('id'), 'page' => $page_next),
                                    array('class' => 'pager__next pager-a')
                                ); ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gr-text">
        <div class="wrap">
            <?= $o_chapter ? $o_chapter['text_seo_' . Yii::app()->language] : $o_page['text_' . Yii::app()->language]; ?>
        </div>
    </div>
</section>