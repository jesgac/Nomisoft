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
<div class="panel panel-default" style="width:40%;">
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
						<?php
						  echo $form->hiddenField($model,'id_persona',array()); // Campo oculto para guardar el ID de la persona seleccionada
						  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						   array(
						    'name'=>'id_persona', // Nombre para el campo de autocompletar
						    'model'=>$model,
						    'value'=>$model->isNewRecord ? '' : $model->persona->apellido.' '.$model->persona->nombre,
						    'source'=>$this->createUrl('nomina/autocomplete'), // URL que genera el conjunto de datos
						    'options'=> array(
						      'showAnim'=>'fold',
						      'size'=>'30',
						      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
						      'select'=>"js:function(event, ui) { 
						       $('#Hijos_id_persona').val(ui.item.id); // HTML-Id del campo
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
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('nombre') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-child fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Nombre')); ?>
						<?php echo  $model->hasErrors('nombre') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'nombre'); ?>
				</div>
				

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('apellido') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-child fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'apellido',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Apellido')); ?>
						<?php echo  $model->hasErrors('apellido') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'apellido'); ?>
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
				

				<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>
			</fieldset>
		</div>
	</div>
	

<?php $this->endWidget(); ?>
</div><!-- form -->

</div><!-- form -->