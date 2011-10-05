<?php
$this->breadcrumbs=array(
	'Familias'=>array('index'),
	'Engadir',
);

$this->menu=array(
	array('label'=>'Listar Familias', 'url'=>array('index')),
);
?>

<h1>Engadir Familia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
