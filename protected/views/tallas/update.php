<?php
/* @var $this TallasController */
/* @var $model Tallas */

$this->breadcrumbs=array(
	'Tallas'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nueva Talla', 'url'=>array('create')),
	array('label'=>'Ver Talla', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Tallas', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>