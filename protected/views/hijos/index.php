<?php
/* @var $this HijosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hijoses',
);

$this->menu=array(
	array('label'=>'Create Hijos', 'url'=>array('create')),
	array('label'=>'Manage Hijos', 'url'=>array('admin')),
);
?>

<h1>Hijoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
