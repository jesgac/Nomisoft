<?php
/* @var $this NominaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nominas',
);

$this->menu=array(
	array('label'=>'Create Nomina', 'url'=>array('create')),
	array('label'=>'Manage Nomina', 'url'=>array('admin')),
);
?>

<h1>Nominas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
