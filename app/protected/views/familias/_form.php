<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'familias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_gal'); ?>
		<?php echo $form->textField($model,'nombre_gal',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nombre_gal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Engadir' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
