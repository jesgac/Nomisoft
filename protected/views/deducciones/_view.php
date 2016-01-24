<?php
/* @var $this DeduccionesController */
/* @var $data Deducciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sso')); ?>:</b>
	<?php echo CHtml::encode($data->sso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spf')); ?>:</b>
	<?php echo CHtml::encode($data->spf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lph')); ?>:</b>
	<?php echo CHtml::encode($data->lph); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inasistencia')); ?>:</b>
	<?php echo CHtml::encode($data->inasistencia); ?>
	<br />


</div>