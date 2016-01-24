<?php
/* @var $this ObrasController */
/* @var $data Obras */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_obra')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_obra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fech_ini')); ?>:</b>
	<?php echo CHtml::encode($data->fech_ini); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fech_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fech_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>