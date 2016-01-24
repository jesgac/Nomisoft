<?php
/* @var $this AsignacionesController */
/* @var $model Asignaciones */

$this->breadcrumbs=array(
	'Asignaciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Asignaciones', 'url'=>array('index')),
	array('label'=>'Create Asignaciones', 'url'=>array('create')),
	array('label'=>'Update Asignaciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Asignaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asignaciones', 'url'=>array('admin')),
);
?>

<h1>View Asignaciones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'b_alimenticio',
		'asistencia',
		'feriado',
		'sabado',
		'horasextra_diurna',
		'horasextras_nocturna',
	),
)); ?>
