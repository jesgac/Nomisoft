<?php
/* @var $this TallasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tallases',
);

$this->menu=array(
	array('label'=>'Create Tallas', 'url'=>array('create')),
	array('label'=>'Manage Tallas', 'url'=>array('admin')),
);
?>

<h1>Tallases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
