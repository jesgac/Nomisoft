<?php
/* @var $this CargosController */
/* @var $model Cargos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'errorMessageCssClass' => 'text-error control-label'
)); ?>
<div class="panel panel-default" style="width:40%;">
		<div class="panel-heading">
			<?php 
				if($model->cargo!=""){
					echo 'Modificar: '.$model->cargo;
				}else{
					echo 'Nuevo Cargo';
				}
			
			?>
		</div>
		<div class="panel-body">
			<fieldset>
				
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('cargo') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-mortar-board fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'cargo',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Cargo', 'title'=>'Indique el nombre del Cargo')); ?>
						<?php echo  $model->hasErrors('cargo') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'cargo'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('sueldo') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'sueldo',array('class'=>'form-control','placeholder'=>'Sueldo', 'title'=>'Indique el Sueldo en Bs.')); ?>
						<?php echo  $model->hasErrors('sueldo') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'sueldo'); ?>
				</div>
				
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('tipo_sueldo') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-check fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($model, 'tipo_sueldo', array(''=>'Tipo Sueldo','1'=>'Semanal', '2'=>'Mensual'),array('class'=>'form-control', 'title'=>'Indique el Tipo de sueldo')); ?>
						<?php echo  $model->hasErrors('tipo_sueldo') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'tipo_sueldo'); ?>
				</div>

				<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>
			</fieldset>
		</div>
	</div>
	

<?php $this->endWidget(); ?>
</div><!-- form -->