<?php
/* @var $this AsignacionesController */
/* @var $data Asignaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('b_alimenticio')); ?>:</b>
	<?php echo CHtml::encode($data->b_alimenticio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asistencia')); ?>:</b>
	<?php echo CHtml::encode($data->asistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feriado')); ?>:</b>
	<?php echo CHtml::encode($data->feriado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sabado')); ?>:</b>
	<?php echo CHtml::encode($data->sabado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horasextra_diurna')); ?>:</b>
	<?php echo CHtml::encode($data->horasextra_diurna); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horasextras_nocturna')); ?>:</b>
	<?php echo CHtml::encode($data->horasextras_nocturna); ?>
	<br />


</div>