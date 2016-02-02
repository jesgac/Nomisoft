<?php
/* @var $this EmpleadosController */
/* @var $model Empleados */

$this->breadcrumbs=array(
	'Trabajador'=>array('admin'),
	$a->persona->nombre.' '.$a->persona->apellido=>array('view','id'=>$a->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'List Empleados', 'url'=>array('index')),
	array('label'=>'Create Empleados', 'url'=>array('create')),
	array('label'=>'View Empleados', 'url'=>array('view', 'id'=>$a->id)),
	array('label'=>'Manage Empleados', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('a'=>$a,'b'=>$b)); ?>