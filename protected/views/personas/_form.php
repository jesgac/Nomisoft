<?php
/* @var $this PersonasController */
/* @var $model Personas */
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
				if($model->nombre!=""){
					echo 'Modificar: '.$model->nombre.' '.$model->apellido;
				}else{
					echo 'Nueva Persona';
				}
			?>
		</div>
		<div class="panel-body">
			<fieldset>
				
				<div class="form-group input-group<?php echo $model->hasErrors('nombre') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-male fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Nombre')); ?>
						<?php echo  $model->hasErrors('nombre') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'nombre'); ?>
				</div>
				

				<div class="form-group input-group<?php echo $model->hasErrors('apellido') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-male fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'apellido',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Apellido')); ?>
						<?php echo  $model->hasErrors('apellido') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'apellido'); ?>
				</div>
				

				<div class="form-group input-group<?php echo $model->hasErrors('cedula') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-barcode fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'cedula',array('size'=>50,'maxlength'=>15,'class'=>'form-control','placeholder'=>'Cedula')); ?>
						<?php echo  $model->hasErrors('cedula') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'cedula'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('fecha_nac') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php echo $form->dateField($model,'fecha_nac',array('class'=>'form-control','placeholder'=>'Fecha de Nacimiento')); ?>
						<?php echo  $model->hasErrors('fecha_nac') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'fecha_nac'); ?>
				</div>
				

				<div class="form-group input-group<?php echo $model->hasErrors('lugar_nac') ? ' has-error' : ''; ?>">
					<div class="input-group">
						
						<?php echo $form->textArea($model,'lugar_nac',array('rows'=>6, 'cols'=>50,'class'=>'form-control','placeholder'=>'Lugar de Nacimiento')); ?>
						<?php echo  $model->hasErrors('lugar_nac') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'lugar_nac'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('nacionalidad') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-flag fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($model, 'nacionalidad', array(''=>'Nacionalidad','V'=>'Venezolano', 'E'=>'Extranjero'),array('class'=>'form-control')); ?>
						<?php echo  $model->hasErrors('nacionalidad') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'nacionalidad'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('sexo') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-venus-mars fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($model, 'sexo', array(''=>'Sexo','M'=>'Masculino', 'F'=>'Femenino'),array('class'=>'form-control')); ?>
						<?php echo  $model->hasErrors('sexo') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'sexo'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('sexo') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<?php echo $form->textArea($model,'direccion',array('rows'=>6, 'cols'=>50,'class'=>'form-control','placeholder'=>'Direccion')); ?>
						<?php echo  $model->hasErrors('direccion') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'direccion'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('telefono') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-phone fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'telefono',array('size'=>11,'maxlength'=>11,'class'=>'form-control','placeholder'=>'Telefono')); ?>
						<?php echo  $model->hasErrors('telefono') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'telefono'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('email') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-at fa-fw"></i>
						</span>
						<?php echo $form->emailField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Email')); ?>
						<?php echo  $model->hasErrors('email') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'email'); ?>
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