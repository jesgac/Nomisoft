<?php
/* @var $this AsignacionesController */
/* @var $model Asignaciones */
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
		<?php echo $form->label($model,'b_alimenticio'); ?>
		<?php echo $form->textField($model,'b_alimenticio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asistencia'); ?>
		<?php echo $form->textField($model,'asistencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feriado'); ?>
		<?php echo $form->textField($model,'feriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sabado'); ?>
		<?php echo $form->textField($model,'sabado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horasextra_diurna'); ?>
		<?php echo $form->textField($model,'horasextra_diurna'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horasextras_nocturna'); ?>
		<?php echo $form->textField($model,'horasextras_nocturna'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->