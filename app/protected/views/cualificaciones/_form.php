<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cualificaciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'familia'); ?>
		<?php echo CHtml::activeDropDownList(
								$model, 
								'id_familia', 
								array(''=>'Seleccione') +
								CHtml::listData(
									Familias::model()->findAll(array('order'=>'nombre_gal')), 
									'id', 'nombre_gal'
								),
								array('style'=>'width:500px;')); ?>
		<?php echo $form->error($model,'id_familia'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'titulo_gal'); ?>
		<?php echo $form->textField($model,'titulo_gal',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'titulo_gal'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nivel'); ?>
		<?php echo $form->textField($model,'nivel'); ?>
		<?php echo $form->error($model,'nivel'); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::listBox(
							'Cualificaciones[unidades]', 
							$unidades, 
							$todasUnidades, 
							array(
								'class' 	=> 'multiselect',
								'style' 	=> 'width: 680px;',
								'id'		=> 'Cualificaciones_unidades',
								'multiple' 	=> 'multiple',
								'size'		=> '18'
							)
						); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCSSFile(Yii::app()->request->baseUrl . '/js/jquery-ui-1.8.16.custom/css/redmond/jquery-ui-1.8.16.custom.css');
$cs->registerCSSFile(Yii::app()->request->baseUrl . '/js/multiselect/css/ui.multiselect.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery-ui-1.8.16.custom/js/jquery-1.6.2.min.js');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/multiselect/js/plugins/scrollTo/jquery.scrollTo-min.js');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/multiselect/js/ui.multiselect.js');
$cs->registerScript('multiselect',
	"$(function(){
		$('.multiselect').multiselect();
	});"
);
?>