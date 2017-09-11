<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Авторизация</h3>
            </div>
            <div class="panel-body">
                <?php if ($model->error_login) { ?>
                    <div class="alert alert-danger text-center">
                        <?= $model->error_login; ?>
                    </div>
                <?php } ?>
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'login-form',
                    'enableAjaxValidation' => false,
                )); ?>
                <fieldset>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'username'); ?>
                        <?php echo $form->textField($model, 'username', array('autofocus' => true, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'username'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'password'); ?>
                        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'password'); ?>
                    </div>
                    <?php echo CHtml::submitButton('Войти', array('class' => 'btn btn-lg btn-success btn-block')); ?>
                </fieldset>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>