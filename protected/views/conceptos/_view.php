<?php
/* @var $this ConceptosController */
/* @var $data Conceptos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_bono')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_bono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bono')); ?>:</b>
	<?php echo CHtml::encode($data->bono); ?>
	<br />


</div>