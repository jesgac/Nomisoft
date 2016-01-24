<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */

$this->breadcrumbs=array(
	'Conceptos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Create Conceptos', 'url'=>array('create')),
	array('label'=>'View Conceptos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Conceptos', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>