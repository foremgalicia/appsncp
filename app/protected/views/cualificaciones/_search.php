<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'titulo_gal'); ?>
		<?php echo $form->textField($model,'titulo_gal',array('size'=>60,'maxlength'=>500)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nivel'); ?>
		<?php echo $form->textField($model,'nivel'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'familia'); ?>
		<?php echo CHtml::activeDropDownList(
							$model, 
							'id_familia', 
							array(''=>'Seleccione') +
							CHtml::listData(
								Familias::model()->findAll(array('order'=>'nombre_gal')), 
								'id', 'nombre_gal'
							),
							array('style'=>'width:500px;')
						); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->