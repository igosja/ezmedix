<?php
/**
 * @var $model PageAbout
 */
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center"><?= $this->h1; ?></h1>
            <ul class="list-inline preview-links text-center">
                <li>
                    <?= CHtml::link(
                        'Редактировать',
                        array('update', 'id' => $model->primaryKey),
                        array('class' => 'btn btn-default')
                    ); ?>
                </li>
            </ul>
        </div>
    </div>
<?php
$attributes = array(
    'h1_ru',
    'h3_ru',
    array(
        'name' => 'text_1_ru',
        'type' => 'raw',
    ),
    array(
        'name' => 'text_2_ru',
        'type' => 'raw',
    ),
    'seo_title_ru',
    'seo_description_ru',
    'seo_keywords_ru',
    'h1_uk',
    'h3_uk',
    array(
        'name' => 'text_1_uk',
        'type' => 'raw',
    ),
    array(
        'name' => 'text_2_uk',
        'type' => 'raw',
    ),
    'seo_title_uk',
    'seo_description_uk',
    'seo_keywords_uk',
    array(
        'name' => 'image_1_id',
        'type' => 'raw',
        'value' => (isset($model['image_1']['url'])) ?
            ('<div class="col-lg-6">
                <a href="javascript:;" class="thumbnail">
                    <img src="' . $model['image_1']['url'] . '"/>
                </a>
            </div>') :
            '',
    ),
    array(
        'name' => 'image_2_id',
        'type' => 'raw',
        'value' => (isset($model['image_2']['url'])) ?
            ('<div class="col-lg-6">
                <a href="javascript:;" class="thumbnail">
                    <img src="' . $model['image_2']['url'] . '"/>
                </a>
            </div>') :
            '',
    ),
    array(
        'name' => 'image_3_id',
        'type' => 'raw',
        'value' => (isset($model['image_3']['url'])) ?
            ('<div class="col-lg-6">
                <a href="javascript:;" class="thumbnail">
                    <img src="' . $model['image_3']['url'] . '"/>
                </a>
            </div>') :
            '',
    ),
    array(
        'name' => 'image_4_id',
        'type' => 'raw',
        'value' => (isset($model['image_4']['url'])) ?
            ('<div class="col-lg-6">
                <a href="javascript:;" class="thumbnail">
                    <img src="' . $model['image_4']['url'] . '"/>
                </a>
            </div>') :
            '',
    ),
);
$this->widget('zii.widgets.CDetailView', array(
    'attributes' => $attributes,
    'data' => $model,
    'htmlOptions' => array('class' => 'table'),
    'itemCssClass' => '',
    'itemTemplate' => '<tr data-controller="' . $this->uniqueid . '"><td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">{label}</td><td>{value}</td></tr>',
    'nullDisplay' => '-',
));
?>