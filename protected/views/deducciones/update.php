<?php
/* @var $this DeduccionesController */
/* @var $model Deducciones */

$this->breadcrumbs=array(
	'Deducciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Deducciones', 'url'=>array('index')),
	array('label'=>'Create Deducciones', 'url'=>array('create')),
	array('label'=>'View Deducciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Deducciones', 'url'=>array('admin')),
);
?>

<h1>Update Deducciones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>