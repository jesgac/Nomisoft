<?php
/* @var $this HijosController */
/* @var $model Hijos */

$this->breadcrumbs=array(
	'Hijos'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Gestionar Hijos', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>