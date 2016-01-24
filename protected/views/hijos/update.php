<?php
/* @var $this HijosController */
/* @var $model Hijos */

$this->breadcrumbs=array(
	'Hijos'=>array('admin'),
	$model->nombre." ".$model->apellido=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nuevo Hijo', 'url'=>array('create')),
	array('label'=>'Ver Hijo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Hijo', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>