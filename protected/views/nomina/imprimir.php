<?php
/* @var $this ImprimirController */
/* @var $model Imprimir */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Nómina'=>array('admin'),
	'Imprimir',
);

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imprimir-imprimir-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
	'errorMessageCssClass' => 'text-error control-label'
)); ?>
	<div class="panel panel-default" style="width:40%;">
	<div class="panel-heading">
		<?php 
			echo "Imprimir";
		?>
	</div>
		<div class="panel-body">
			<fieldset>
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('fecha') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php
							  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
							   'model'=>$model,
							   'attribute'=>'fecha',
							   'value'=>$model->fecha,
							   'language' => 'es',
							   'htmlOptions' => array('readonly'=>'readonly','class'=>'form-control','placeholder'=>'Fecha','title'=>'Indique la fecha'),
							   'options'=>array(
							    'autoSize'=>true,
							    'defaultDate'=>$model->fecha,
							    'dateFormat'=>'yy-mm-dd',
							    'buttonImage'=>'',
							    'buttonImageOnly'=>false,
							    'buttonText'=>'Fecha',
							    'selectOtherMonths'=>true,
							    'showAnim'=>'slide',
							    'showButtonPanel'=>true,
							    'showOn'=>'focus', 
							    'showOtherMonths'=>true, 
							    'changeMonth' => 'true', 
							    'changeYear' => 'true', 
							    'yearRange'=>'1900:3000',
							    ),
							  )); 
						 ?>
						<?php echo  $model->hasErrors('fecha') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'fecha'); ?>
				</div>
			<?php echo CHtml::submitButton('Imprimir',array('class'=>'btn btn-primary btn-block')); ?>
			</fieldset>
		</div>
	</div>
	



<?php $this->endWidget(); ?>

</div><!-- form -->