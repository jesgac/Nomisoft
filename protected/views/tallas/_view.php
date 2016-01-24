<?php
/* @var $this TallasController */
/* @var $data Tallas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('talla_zapato')); ?>:</b>
	<?php echo CHtml::encode($data->talla_zapato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('talla_pantalon')); ?>:</b>
	<?php echo CHtml::encode($data->talla_pantalon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('talla_camisa')); ?>:</b>
	<?php echo CHtml::encode($data->talla_camisa); ?>
	<br />


</div>