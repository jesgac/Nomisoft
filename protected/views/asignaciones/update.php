<?php
/* @var $this AsignacionesController */
/* @var $model Asignaciones */

$this->breadcrumbs=array(
	'Asignaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asignaciones', 'url'=>array('index')),
	array('label'=>'Create Asignaciones', 'url'=>array('create')),
	array('label'=>'View Asignaciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Asignaciones', 'url'=>array('admin')),
);
?>

<h1>Update Asignaciones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>