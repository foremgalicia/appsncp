<?php
$this->pageTitle=Yii::app()->name . ' - Inicio de sesión';
$this->breadcrumbs=array(
	'Inicio de sesión',
);
?>

<h1>Inicio de sesión</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Os campos marcados con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			iniciar sesión con <tt>admin/admin</tt>.
		</p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Iniciar sesión'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
