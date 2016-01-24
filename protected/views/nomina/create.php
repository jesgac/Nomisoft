<?php
/* @var $this NominaController */
/* @var $model Nomina */

$this->breadcrumbs=array(
	'Nomina'=>array('admin'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Nueva Nomina', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('a'=>$a,'b'=>$b,'c'=>$c)); ?>