<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
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
				if($model->nombre_emp!=""){
					echo 'Modificar: '.$model->nombre_emp;
				}else{
					echo 'Nueva Empresa';
				}
			
			?>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('nombre_emp') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-briefcase fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'nombre_emp',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Nombre de Empresa' , 'title'=>'Indique el nombre de la empresa.')); ?>
						<?php echo  $model->hasErrors('nombre_emp') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'nombre_emp'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('direccion') ? ' has-error' : ''; ?>">
					<div class="input-group">
						
						<?php echo $form->textArea($model,'direccion',array('rows'=>6, 'cols'=>95,'class'=>'form-control','placeholder'=>'Dirección','title'=>'Indique la direccion de la empresa.')); ?>
						<?php echo  $model->hasErrors('direccion') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'direccion'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('telefono') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-phone fa-fw"></i>
						</span>
						<?php 
						 $this->widget('CMaskedTextField', array(
						  'model' => $model,
						  'attribute' => 'telefono',
						  'mask' => '(9999)-999-9999',
						  'htmlOptions' => array('size' => 11, 
						  'class'=>'form-control','placeholder'=>'Teléfono', 'title'=>'Indique el numero de telefono de la empresa.'	
						  	)
						 ));
						?> 
						<?php echo  $model->hasErrors('telefono') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'telefono'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('rif') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-barcode fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'rif',array('size'=>15,'maxlength'=>15,'class'=>'form-control','placeholder'=>'Rif', 'title'=>'Indique el RIF de la empresa.')); ?>
						<?php echo  $model->hasErrors('rif') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'rif'); ?>
				</div>

				<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>

			</fieldset>
		</div>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->