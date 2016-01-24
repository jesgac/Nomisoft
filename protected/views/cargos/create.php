<?php
/* @var $this CargosController */
/* @var $model Cargos */

$this->breadcrumbs=array(
	'Cargos'=>array('admin'),
	'Nuevo Cargo',
);

$this->menu=array(
	array('label'=>'Gestionar Cargos', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>