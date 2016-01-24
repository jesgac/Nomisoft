<?php
/* @var $this PersonasController */
/* @var $model Personas */

$this->breadcrumbs=array(
	'Personas'=>array('admin'),
	'Nueva Persona',
);

$this->menu=array(
	array('label'=>'Gestionar Personas', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>