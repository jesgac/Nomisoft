<?php
/* @var $this DeduccionesController */
/* @var $model Deducciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deducciones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sso'); ?>
		<?php echo $form->textField($model,'sso'); ?>
		<?php echo $form->error($model,'sso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spf'); ?>
		<?php echo $form->textField($model,'spf'); ?>
		<?php echo $form->error($model,'spf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lph'); ?>
		<?php echo $form->textField($model,'lph'); ?>
		<?php echo $form->error($model,'lph'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inasistencia'); ?>
		<?php echo $form->textField($model,'inasistencia'); ?>
		<?php echo $form->error($model,'inasistencia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->