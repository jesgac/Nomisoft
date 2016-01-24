<?php
/* @var $this TallasController */
/* @var $model Tallas */

$this->breadcrumbs=array(
	'Tallas'=>array('admin'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Gestionar Talla', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>