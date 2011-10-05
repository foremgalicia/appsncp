<?php
$this->breadcrumbs=array(
	'Cualificación'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Cualificacións', 'url'=>array('index')),
	array('label'=>'Engadir Cualificación', 'url'=>array('create')),
	array('label'=>'Editar Cualificación', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Cualificación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que desexa borrar este elemento?')),
);
?>

<h1>Visualizar Cualificación #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo_gal',
		'titulo',
		'codigo',
		'nivel',
	),
)); ?>

<br />
<h3>Familia</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'label' => 'Nombre Gal',
			'value' => $model->familia->nombre_gal,
		),
		array(
			'label' => 'Nombre',
			'value' => $model->familia->nombre,
		),
	),
)); ?>

<br />
<h3>Unidades</h3>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidades-grid',
	'dataProvider'=>new CArrayDataProvider(
							Unidades::model()->findAll(CualificacionesUnidades::getCriteriaUnidadesCualidicacion($model->id)), 
							array(
							    'id'=>'unidades',
							    'pagination'=>array(
							        'pageSize'=>10,
							    ),
							)),
	'columns'=>array(
		array(
			'header' => 'ID',
			'value'  => '$data->id'
		),
		array(
			'header' => 'Título Gal',
			'value'  => '$data->titulo_gal'
		),
		array(
			'header' => 'Título',
			'value'  => '$data->titulo'
		),
		array(
			'header' => 'Código',
			'value'  => '$data->codigo'
		),
		array(
			'header' => 'Nivel',
			'value'  => '$data->nivel'
		),
	),
)); ?>
