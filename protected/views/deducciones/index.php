<?php
/* @var $this DeduccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deducciones',
);

$this->menu=array(
	array('label'=>'Create Deducciones', 'url'=>array('create')),
	array('label'=>'Manage Deducciones', 'url'=>array('admin')),
);
?>

<h1>Deducciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
