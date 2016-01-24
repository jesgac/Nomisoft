<?php
/* @var $this CargosController */
/* @var $model Cargos */

$this->breadcrumbs=array(
	'Cargos'=>array('admin'),
	$model->cargo=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nuevo Cargo', 'url'=>array('create')),
	array('label'=>'Ver Cargo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Cargos', 'url'=>array('admin')),
);
?>

<h1>Modificar Cargo: <?php echo $model->cargo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>