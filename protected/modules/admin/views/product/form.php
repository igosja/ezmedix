<?php
/**
 * @var $form  CActiveForm
 * @var $model Product
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
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#main" data-toggle="tab">Общая информация</a></li>
            <li><a href="#seo" data-toggle="tab">SEO</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="main">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'category_id'); ?></td>
                        <td>
                            <?= $form->dropDownList($model, 'category_id',
                                CHtml::listData(Category::model()->findAll(), 'id', 'h1_ru'),
                                array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'category_id'); ?>
                        </td>
                    </tr>
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
                        <td class="col-lg-3"><?= $form->labelEx($model, 'url'); ?></td>
                        <td>
                            <?= $form->textField($model, 'url', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'url'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'price'); ?></td>
                        <td>
                            <?= $form->textField($model, 'price', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'price'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'pdf_field'); ?></td>
                        <td>
                            <input type="file" name="pdf[]" class="form-control" multiple="multiple" />
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'image'); ?></td>
                        <td>
                            <input type="file" name="image[]" class="form-control" multiple/>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'parameter_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'parameter_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'parameter_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'parameter_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'parameter_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'parameter_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'composition_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'composition_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'composition_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'composition_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'composition_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'composition_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'release_form_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'release_form_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'release_form_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'release_form_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'release_form_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'release_form_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'shelf_life_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'shelf_life_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'shelf_life_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'shelf_life_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'shelf_life_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'shelf_life_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'attention_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'attention_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'attention_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'attention_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'attention_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'attention_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'text_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'text_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'filter_field'); ?></td>
                        <td>
                            <div class="checkbox-overflow">
                                <?= $form->checkBoxList(
                                    $model,
                                    'filter_field',
                                    CHtml::listData(Filter::model()->findAll(), 'id', 'h1_ru'),
                                    array('class' => 'ckeditor')
                                ); ?>
                            </div>
                            <?= $form->error($model, 'filter_field'); ?>
                        </td>
                    </tr>
                </table>
            </div>
            <?= $this->renderPartial('/include/seo-form', array('model' => $model, 'form' => $form)) ?>
        </div>
        <p class="text-center">
            <?= CHtml::submitButton('Сохранить', array('class' => 'btn btn-default text-center')); ?>
        </p>
        <?php $this->endWidget(); ?>
    </div>
</div>