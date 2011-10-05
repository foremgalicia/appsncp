<?php
$this->pageTitle=Yii::app()->name . ' - Erro';
$this->breadcrumbs=array(
	'Erro',
);
?>

<h2>Erro <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
