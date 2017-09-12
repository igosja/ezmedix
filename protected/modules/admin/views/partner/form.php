<?php
/**
 * @var $form CActiveForm
 * @var $model Partner
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center"><?= $this->h1; ?></h1>
        <ul class="list-inline preview-links text-center">
            <li>
                <?= CHtml::link(
                    'Назад',
                    isset($model->id) ? array('view', 'id' => $model->id) : array('index'),
                    array('class' => 'btn btn-default')
                ); ?>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'blog-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'h1_ru'); ?></td>
                <td>
                    <?= $form->textField($model, 'h1_ru', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'h1_ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'h1_uk'); ?></td>
                <td>
                    <?= $form->textField($model, 'h1_uk', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'h1_uk'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'address_ru'); ?></td>
                <td>
                    <?= $form->textField($model, 'address_ru', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'address_ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'address_uk'); ?></td>
                <td>
                    <?= $form->textField($model, 'address_uk', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'address_uk'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3">
                    <?= $form->labelEx($model, 'phone_ru'); ?>
                    <br/>
                    Через точку с запятой без пробелов, пример: "(044) 123-45-67;044 123-45-67 - Факс;050 123 4567"
                </td>
                <td>
                    <?= $form->textField($model, 'phone_ru', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'phone_ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3">
                    <?= $form->labelEx($model, 'phone_uk'); ?>
                    <br/>
                    Через точку с запятой без пробелов, пример: "(044) 123-45-67;044 123-45-67 - Факс;050 123 4567"
                </td>
                <td>
                    <?= $form->textField($model, 'phone_uk', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'phone_uk'); ?>
                </td>
            </tr>
        </table>
        <p class="text-center">
            <?= CHtml::submitButton('Сохранить', array('class' => 'btn btn-default text-center')); ?>
        </p>
        <?php $this->endWidget(); ?>
    </div>
</div>