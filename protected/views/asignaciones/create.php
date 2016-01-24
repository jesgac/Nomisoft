<?php
/* @var $this AsignacionesController */
/* @var $model Asignaciones */

$this->breadcrumbs=array(
	'Asignaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asignaciones', 'url'=>array('index')),
	array('label'=>'Manage Asignaciones', 'url'=>array('admin')),
);
?>

<h1>Create Asignaciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>