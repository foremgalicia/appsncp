<?php
$this->breadcrumbs=array(
	'Cualificaciones'=>array('index'),
	'Index',
);

$this->menu=array(
	array('label'=>'Cadastrar Cualificacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cualificaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Cualificaciones</h1>

<p>
Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer.
</p>

<?php echo CHtml::link('Busca Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cualificaciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo_gal',
		'titulo',
		'codigo',
		'nivel',
		array(
			'header'	=> 'Familia',
			'name' 		=> 'id_familia',
			'value' 	=> '$data->familia->nombre_gal',
			'filter' 	=> CHtml::listData(Familias::model()->findAll(array('order'=>'nombre_gal')), 'id', 'nombre_gal'), 
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
