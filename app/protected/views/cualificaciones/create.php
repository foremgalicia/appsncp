<?php
$this->breadcrumbs=array(
	'Cualificaciones'=>array('index'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Cualificaciones', 'url'=>array('index')),
);
?>

<h1>Cadastrar Cualificacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'unidades'=>$unidades, 'todasUnidades' => $todasUnidades)); ?>