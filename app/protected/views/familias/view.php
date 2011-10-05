<?php
$this->breadcrumbs=array(
	'Familias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Familias', 'url'=>array('index')),
	array('label'=>'Engadir Familia', 'url'=>array('create')),
	array('label'=>'Editar Familia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Familia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que desexa borrar este elemento?')),
);
?>

<h1>Visualizar Familia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'nombre_gal',
	),
)); ?>

<br />
<h3>Cualificaciones</h3>

<?php 
$modelCualificaciones = new Cualificaciones;
$modelCualificaciones->unsetAttributes();
$modelCualificaciones->id_familia = $model->id;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cualificaciones-grid',
	'dataProvider'=>$modelCualificaciones->search(),
	'columns'=>array(
		'id',
		'titulo',
		'titulo_gal',
		'codigo',
		'nivel',
		array(
			'class'				=> 'CButtonColumn',
			'viewButtonUrl'		=> 'Yii::app()->controller->createUrl("cualificaciones/view",array("id"=>$data->primaryKey))',
			'updateButtonUrl'	=> 'Yii::app()->controller->createUrl("cualificaciones/update",array("id"=>$data->primaryKey))',
			'deleteButtonUrl'	=> 'Yii::app()->controller->createUrl("cualificaciones/delete",array("id"=>$data->primaryKey))',
		),
	),
)); ?>
