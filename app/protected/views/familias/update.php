<?php
$this->breadcrumbs=array(
	'Familias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Familias', 'url'=>array('index')),
	array('label'=>'Engadir Familia', 'url'=>array('create')),
	array('label'=>'Visualizar Familia', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Editar Familia #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
