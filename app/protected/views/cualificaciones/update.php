<?php
$this->breadcrumbs=array(
	'Cualificaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Cualificaciones', 'url'=>array('index')),
	array('label'=>'Cadastrar Cualificacion', 'url'=>array('create')),
	array('label'=>'Visualizar Cualificacion', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Editar Cualificacion #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'unidades'=>$unidades, 'todasUnidades' => $todasUnidades)); ?>