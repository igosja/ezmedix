<?php
/**
 * @var $model Partner
 */
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center"><?= $this->h1; ?></h1>
            <ul class="list-inline preview-links text-center">
                <li>
                    <?= CHtml::link(
                        'Список',
                        array('index'),
                        array('class' => 'btn btn-default')
                    ); ?>
                </li>
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
    'id',
    'h1_ru',
    'address_ru',
    array(
        'name' => 'phone_ru',
        'type' => 'raw',
        'value' => function ($model) {
            $phone = explode(';', $model['phone_ru']);
            $phone = implode('<br/>', $phone);
            return $phone;
        },
    ),
    'h1_uk',
    'address_uk',
    array(
        'name' => 'phone_uk',
        'type' => 'raw',
        'value' => function ($model) {
            $phone = explode(';', $model['phone_uk']);
            $phone = implode('<br/>', $phone);
            return $phone;
        },
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