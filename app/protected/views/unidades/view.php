<?php
$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Unidades', 'url'=>array('index')),
	array('label'=>'Engadir Unidade', 'url'=>array('create')),
	array('label'=>'Editar Unidade', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Unidade', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que desexa borrar este elemento?')),
);
?>

<h1>Visualizar Unidade #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo_gal',
		'titulo',
		'codigo',
		'nivel',
		'medios',
		'productos',
		'informacion',
	),
)); ?>

<br />
<h3>Cualificacións</h3>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cualificaciones-grid',
	'dataProvider'=>new CArrayDataProvider(
							Cualificaciones::model()->findAll(CualificacionesUnidades::getCriteriaCualificacionesUnidad($model->id)),
							array(
							    'id'=>'cualificaciones',
							    'pagination'=>array(
							        'pageSize'=>10,
							    ),
							)),
	'columns'=>array(
		'titulo_gal',
		'titulo',
		'codigo',
		'nivel',
		array(
			'header'	=> 'Familia',
			'name' 		=> 'id_familia',
			'value' 	=> '$data->familia->nombre_gal',
		),
	),
)); ?>
