<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
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
		<?php echo CHtml::label('Cualificación', 'Unidades[cualificacion]'); ?>
		<?php echo CHtml::dropDownList('Unidades[cualificacion]', $cualificacion, 
							CHtml::listData(Cualificaciones::model()->findAll(array('order'=>'titulo_gal')), 'id', 'titulo_gal'),
							array('empty' => 'Seleccione', 'style' => 'width: 500px;')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
