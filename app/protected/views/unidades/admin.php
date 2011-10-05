<?php
$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	'Indice',
);

$this->menu=array(
	array('label'=>'Engadir Unidade', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('unidades-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Unidades</h1>

<p>
Se o desexa, pode engadir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) ao comezo de cada un dos valores da súa busca para especificar como se debe facer a comparación.
</p>

<?php echo CHtml::link('Busca avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'			=> $model,
	'cualificacion'	=> $cualificacion,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidades-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo_gal',
		'titulo',
		'codigo',
		'nivel',
		/*'medios',
		'productos',
		'informacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
