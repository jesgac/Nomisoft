<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="panel panel-default" style="width:40%;">
		<div class="panel-heading">
			<?php 
				if($model->id!=""){
					echo 'Modificar Usuario: '.$model->user;
				}else{
					echo 'Nuevo Usuario';
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
						<?php
						  echo $form->hiddenField($model,'id_persona',array()); // Campo oculto para guardar el ID de la persona seleccionada
						  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						   array(
						    'name'=>'id_persona', // Nombre para el campo de autocompletar
						    'model'=>$model,
						    'value'=>$model->isNewRecord ? '' : $model->persona->apellido.' '.$model->persona->nombre,
						    'source'=>$this->createUrl('Empleados/autocomplete'), // URL que genera el conjunto de datos
						    'options'=> array(
						      'showAnim'=>'fold',
						      'size'=>'30',
						      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
						      'select'=>"js:function(event, ui) { 
						       $('#Usuario_id_persona').val(ui.item.id); // HTML-Id del campo
						       }"
						      ),
						    'htmlOptions'=> array(
						     'size'=>60,
						     'class'=>'form-control',
						     'placeholder'=>'Buscar persona...',
						     'title'=>'Indique la persona que tendrá la reunión.'
						     ),
						   ));  
						 ?>
						<?php echo  $model->hasErrors('id_persona') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>	
					</div>
					<?php echo $form->error($model,'id_persona'); ?>
				</div>
	
					<div class="form-group input-group<?php echo $model->hasErrors('user') ? ' has-error' : ''; ?>">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user fa-fw"></i>
							</span>
							<?php echo $form->textField($model,'user',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Usuario')); ?>
							<?php echo  $model->hasErrors('user') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
						</div>
						<?php echo $form->error($model,'user'); ?>
					</div>

					<div class="form-group input-group<?php echo $model->hasErrors('pass') ? ' has-error' : ''; ?>">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-key fa-fw"></i>
							</span>
							<?php echo $form->passwordField($model,'pass',array('size'=>50,'maxlength'=>160,'class'=>'form-control','placeholder'=>'Contraseña')); ?>
							<?php echo  $model->hasErrors('pass') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
						</div>
						<?php echo $form->error($model,'pass'); ?>
					</div>

					<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('nivel') ? ' has-error' : ''; ?>">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-warning fa-fw"></i>
							</span>
							<?php echo $form->dropDownList($model,'nivel',array(''=>'Nivel Acceso','1'=>'General', '2'=>'Impresión'),array('class'=>'form-control','placeholder'=>'Nivel')); ?>
							<?php echo  $model->hasErrors('nivel') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
						</div>
						<?php echo $form->error($model,'nivel'); ?>
					</div>

					<div class="form-group">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
					</div>

				
		</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->