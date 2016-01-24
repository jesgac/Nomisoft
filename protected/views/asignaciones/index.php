<?php
/* @var $this AsignacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asignaciones',
);

$this->menu=array(
	array('label'=>'Create Asignaciones', 'url'=>array('create')),
	array('label'=>'Manage Asignaciones', 'url'=>array('admin')),
);
?>

<h1>Asignaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
