<?php
/* @var $this NominaController */
/* @var $model Nomina */

$this->breadcrumbs=array(
	'Nominas'=>array('admin'),
	$a->persona->nombre.' '.$a->persona->apellido=>array('view','id'=>$a->id),
	'Modificar',
);
?>

<?php $this->renderPartial('_form', array('a'=>$a,'b'=>$b,'c'=>$c)); ?>