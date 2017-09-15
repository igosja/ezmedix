<?php
/**
 * @var $form CActiveForm
 * @var $model User
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
                <td class="col-lg-3"><?= $form->labelEx($model, 'login'); ?></td>
                <td>
                    <?= $form->textField($model, 'login', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'login'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'email'); ?></td>
                <td>
                    <?= $form->textField($model, 'email', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'email'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'name'); ?></td>
                <td>
                    <?= $form->textField($model, 'name', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'name'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'phone'); ?></td>
                <td>
                    <?= $form->textField($model, 'phone', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'phone'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'address'); ?></td>
                <td>
                    <?= $form->textField($model, 'address', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'address'); ?>
                </td>
            </tr>
            <?php if (Yii::app()->user->id != $model->primaryKey) { ?>
                <tr>
                    <td class="col-lg-3"><?= $form->labelEx($model, 'userrole_id'); ?></td>
                    <td>
                        <?= $form->dropDownList($model, 'userrole_id', CHtml::listData(UserRole::model()->findAll(), 'id', 'name'), array('class' => 'form-control')); ?>
                        <?= $form->error($model, 'userrole_id'); ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'usertype_id'); ?></td>
                <td>
                    <?= $form->dropDownList($model, 'usertype_id', CHtml::listData(UserType::model()->findAll(), 'id', 'h1_ru'), array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'usertype_id'); ?>
                </td>
            </tr>
        </table>
        <p class="text-center">
            <?= CHtml::submitButton('Сохранить', array('class' => 'btn btn-default text-center')); ?>
        </p>
        <?php $this->endWidget(); ?>
    </div>
</div>