<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */

$this->breadcrumbs=array(
	'Conceptos'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Manage Conceptos', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>