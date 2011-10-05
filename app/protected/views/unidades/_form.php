<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unidades-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->labelEx($model,'medios'); ?>
		<?php echo $form->textArea($model,'medios',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'medios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productos'); ?>
		<?php echo $form->textArea($model,'productos',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'productos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'informacion'); ?>
		<?php echo $form->textArea($model,'informacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'informacion'); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::listBox(
							'Unidades[cualificaciones]', 
							$cualificaciones, 
							$todasCualificaciones,
							array(
								'class' 	=> 'multiselect',
								'style' 	=> 'width: 680px;',
								'id'		=> 'Unidades_cualificaciones',
								'multiple' 	=> 'multiple',
								'size'		=> '18'
							)
						); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Engadir' : 'Actualizar'); ?>
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
