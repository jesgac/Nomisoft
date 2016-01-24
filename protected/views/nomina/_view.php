<?php
/* @var $this NominaController */
/* @var $data Nomina */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empleado')); ?>:</b>
	<?php echo CHtml::encode($data->id_empleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_asignacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_asignacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_deduccion')); ?>:</b>
	<?php echo CHtml::encode($data->id_deduccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_asig')); ?>:</b>
	<?php echo CHtml::encode($data->total_asig); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_deduc')); ?>:</b>
	<?php echo CHtml::encode($data->total_deduc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('neto')); ?>:</b>
	<?php echo CHtml::encode($data->neto); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vaciado')); ?>:</b>
	<?php echo CHtml::encode($data->vaciado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prestamos')); ?>:</b>
	<?php echo CHtml::encode($data->prestamos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otros')); ?>:</b>
	<?php echo CHtml::encode($data->otros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descuento')); ?>:</b>
	<?php echo CHtml::encode($data->descuento); ?>
	<br />

	*/ ?>

</div>