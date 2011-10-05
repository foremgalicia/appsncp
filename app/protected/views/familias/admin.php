<?php
$this->breadcrumbs=array(
	'Familias'=>array('index'),
	'Indice',
);

$this->menu=array(
	array('label'=>'Engadir Familia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('familias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Familias</h1>

<p>
Se o desexa, pode engadir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) ao comezo de cada un dos valores da sua busca para especificar cómo debe facer a comparación.
</p>

<?php echo CHtml::link('Busca Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'familias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre_gal',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
