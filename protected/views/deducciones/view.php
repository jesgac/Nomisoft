<?php
/* @var $this DeduccionesController */
/* @var $model Deducciones */

$this->breadcrumbs=array(
	'Deducciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Deducciones', 'url'=>array('index')),
	array('label'=>'Create Deducciones', 'url'=>array('create')),
	array('label'=>'Update Deducciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Deducciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deducciones', 'url'=>array('admin')),
);
?>

<h1>View Deducciones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sso',
		'spf',
		'lph',
		'inasistencia',
	),
)); ?>
