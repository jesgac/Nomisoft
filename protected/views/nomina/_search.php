<?php
/* @var $this NominaController */
/* @var $model Nomina */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_empleado'); ?>
		<?php echo $form->textField($model,'id_empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_asignacion'); ?>
		<?php echo $form->textField($model,'id_asignacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_deduccion'); ?>
		<?php echo $form->textField($model,'id_deduccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_asig'); ?>
		<?php echo $form->textField($model,'total_asig'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_deduc'); ?>
		<?php echo $form->textField($model,'total_deduc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'neto'); ?>
		<?php echo $form->textField($model,'neto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vaciado'); ?>
		<?php echo $form->textField($model,'vaciado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prestamos'); ?>
		<?php echo $form->textField($model,'prestamos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otros'); ?>
		<?php echo $form->textField($model,'otros'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->