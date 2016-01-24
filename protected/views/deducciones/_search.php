<?php
/* @var $this DeduccionesController */
/* @var $model Deducciones */
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
		<?php echo $form->label($model,'sso'); ?>
		<?php echo $form->textField($model,'sso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spf'); ?>
		<?php echo $form->textField($model,'spf'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lph'); ?>
		<?php echo $form->textField($model,'lph'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inasistencia'); ?>
		<?php echo $form->textField($model,'inasistencia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->