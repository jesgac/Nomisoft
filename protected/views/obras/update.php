<?php
/* @var $this ObrasController */
/* @var $model Obras */

$this->breadcrumbs=array(
	'Obras'=>array('admin'),
	$model->nombre_obra=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nueva Obra', 'url'=>array('create')),
	array('label'=>'Ver Obra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Obras', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>