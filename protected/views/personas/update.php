<?php
/* @var $this PersonasController */
/* @var $model Personas */

$this->breadcrumbs=array(
	'Personas'=>array('admin'),
	$model->nombre.' '.$model->apellido=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nueva Persona', 'url'=>array('create')),
	array('label'=>'Ver '.$model->nombre.' '.$model->apellido, 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Personas', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>