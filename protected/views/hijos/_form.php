<?php
/* @var $this HijosController */
/* @var $model Hijos */
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
<div class="panel panel-default col-xs-12">
		<div class="panel-heading">
			<?php 
				if($model->nombre!=""){
					echo 'Modificar: '.$model->nombre.' '.$model->apellido;
				}else{
					echo 'Nuevo Hijo';
				}
			
			?>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('id_persona') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-male fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($model, 'id_persona', Personas::items(1),array('class'=>'form-control','title'=>'Indique el nombre del Trabajador')); ?>
						<?php echo  $model->hasErrors('id_persona') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'id_persona'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('nombre') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-child fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Nombre', 'title'=>'Indique el Nombre.')); ?>
						<?php echo  $model->hasErrors('nombre') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'nombre'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('apellido') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-child fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'apellido',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Apellido', 'title'=>'Indique el Apellido')); ?>
						<?php echo  $model->hasErrors('apellido') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'apellido'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('fecha_nac') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php echo $form->dateField($model,'fecha_nac',array('class'=>'form-control','placeholder'=>'Fecha de Nacimiento', 'title'=>'Indique la fecha de nacimiento.')); ?>
						<?php echo  $model->hasErrors('fecha_nac') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'fecha_nac'); ?>
				</div>
				

				<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>
			</fieldset>
		</div>
	</div>
	

<?php $this->endWidget(); ?>
</div><!-- form -->

</div><!-- form -->