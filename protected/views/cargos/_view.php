<?php
/* @var $this CargosController */
/* @var $data Cargos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sueldo')); ?>:</b>
	<?php echo CHtml::encode($data->sueldo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sueldo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sueldo); ?>
	<br />


</div>