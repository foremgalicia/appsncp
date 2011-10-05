<?php
$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	'Engadir',
);

$this->menu=array(
	array('label'=>'Listar Unidades', 'url'=>array('index')),
);
?>

<h1>Engadir Unidade</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'cualificaciones'=>$cualificaciones, 'todasCualificaciones' => $todasCualificaciones)); ?>
