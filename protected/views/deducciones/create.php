<?php
/* @var $this DeduccionesController */
/* @var $model Deducciones */

$this->breadcrumbs=array(
	'Deducciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Deducciones', 'url'=>array('index')),
	array('label'=>'Manage Deducciones', 'url'=>array('admin')),
);
?>

<h1>Create Deducciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>