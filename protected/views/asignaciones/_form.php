<?php
/* @var $this AsignacionesController */
/* @var $model Asignaciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asignaciones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'b_alimenticio'); ?>
		<?php echo $form->textField($model,'b_alimenticio'); ?>
		<?php echo $form->error($model,'b_alimenticio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asistencia'); ?>
		<?php echo $form->textField($model,'asistencia'); ?>
		<?php echo $form->error($model,'asistencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feriado'); ?>
		<?php echo $form->textField($model,'feriado'); ?>
		<?php echo $form->error($model,'feriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sabado'); ?>
		<?php echo $form->textField($model,'sabado'); ?>
		<?php echo $form->error($model,'sabado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horasextra_diurna'); ?>
		<?php echo $form->textField($model,'horasextra_diurna'); ?>
		<?php echo $form->error($model,'horasextra_diurna'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horasextras_nocturna'); ?>
		<?php echo $form->textField($model,'horasextras_nocturna'); ?>
		<?php echo $form->error($model,'horasextras_nocturna'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->