<?php
/**
 * @var $model Contact
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
    array(
        'name' => 'address_ru',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['address_ru']);
        },
    ),
    array(
        'name' => 'phone_ru',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['phone_ru']);
        },
    ),
    array(
        'name' => 'schedule_ru',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['schedule_ru']);
        },
    ),
    'seo_title_ru',
    'seo_description_ru',
    'seo_keywords_ru',
    'h1_uk',
    array(
        'name' => 'address_uk',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['address_uk']);
        },
    ),
    array(
        'name' => 'phone_uk',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['phone_uk']);
        },
    ),
    array(
        'name' => 'schedule_uk',
        'type' => 'raw',
        'value' => function ($model) {
            return nl2br($model['schedule_uk']);
        },
    ),
    'schedule_uk',
    'seo_title_uk',
    'seo_description_uk',
    'seo_keywords_uk',
    'email',
    'email_letter',
    'lat',
    'lng',
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