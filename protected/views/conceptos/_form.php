<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conceptos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'errorMessageCssClass' => 'text-error control-label'
)); ?>
	<div class="panel panel-default col-xs-12">
		<div class="panel-heading">
			<?php 
				if($model->id!=""){
					echo 'Modificar Concepto: '.$model->tipo_bono;
				}else{
					echo 'Nuevo Concepto';
				}
			
			?>
		</div>
		<div class="panel-body">
			<fieldset>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('Fecha') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php
  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$model,
   'attribute'=>'Fecha',
   'value'=>$model->Fecha,
   'language' => 'es',
   'htmlOptions' => array('readonly'=>'readonly','class'=>'form-control','placeholder'=>'Fecha','title'=>'Indique la fecha del concepto'),
   'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->Fecha,
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
    'minDate'=>'-20Y', 
    'maxDate'=> "+20Y",
    ),
  )); 
 ?>
						<?php echo  $model->hasErrors('Fecha') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'Fecha'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('tipo_bono') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-edit fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($model, 'tipo_bono', array(
							''=>'Seleccione un Concepto',
							'1'=>'Unidad Tributaria',
							'2'=>'HE Diurna',
							'3'=>'HE Nocturna',
							'4'=>'Feriado',
							'5'=>'Sabado',
							'6'=>'Bono Alimenticio',
							'7'=>'SSO',
							'8'=>'SPF',
							'9'=>'FAOV',
						),array('class'=>'form-control','title'=>'Indique el Concepto')); ?>
					<?php echo  $model->hasErrors('tipo_bono') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>	
					</div>
					<?php echo $form->error($model,'tipo_bono'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('bono') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'bono',array('size'=>50,'maxlength'=>10,'class'=>'form-control','placeholder'=>'Valor', 'title'=>'Indique Valor del Concepto')); ?>
						<?php echo  $model->hasErrors('bono') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'bono'); ?>
				</div>

			
				<div class="form-group">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>

		</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->