<?php
$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Unidades', 'url'=>array('index')),
	array('label'=>'Engadir Unidade', 'url'=>array('create')),
	array('label'=>'Visualizar Unidade', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Editar Unidade #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'cualificaciones'=>$cualificaciones, 'todasCualificaciones' => $todasCualificaciones)); ?>
