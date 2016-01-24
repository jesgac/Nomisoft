<?php
/* @var $this EmpleadosController */
/* @var $data Empleados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_persona')); ?>:</b>
	<?php echo CHtml::encode($data->id_persona); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_obra')); ?>:</b>
	<?php echo CHtml::encode($data->id_obra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_cuenta')); ?>:</b>
	<?php echo CHtml::encode($data->nro_cuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->id_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_talla')); ?>:</b>
	<?php echo CHtml::encode($data->id_talla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->id_cargo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_banco')); ?>:</b>
	<?php echo CHtml::encode($data->cod_banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_empleado')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_empleado); ?>
	<br />

	*/ ?>

</div>