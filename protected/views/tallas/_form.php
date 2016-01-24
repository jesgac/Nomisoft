<?php
/* @var $this TallasController */
/* @var $model Tallas */
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
)); ?>
<div class="panel panel-default" style="width:40%;">
		<div class="panel-heading">
			<?php 
				if($model->id!=""){
					echo 'Modificar Talla: '.$model->id;
				}else{
					echo 'Nueva Talla';
				}
			
			?>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="form-group input-group">
					<span class="input-group-addon">
						<i class="fa fa-slack fa-fw"></i>
					</span>
					<?php echo $form->textField($model,'talla_zapato',array('size'=>11,'maxlength'=>11,'class'=>'form-control','placeholder'=>'Talla de Zapato', 'required'=>'required')); ?>
				</div>
				<?php echo $form->error($model,'talla_zapato',array('class'=>'alert alert-danger','style'=>'padding:6px;')); ?>
				<hr>

				<div class="form-group input-group">
					<span class="input-group-addon">
						<i class="fa fa-slack fa-fw"></i>
					</span>
					<?php echo $form->textField($model,'talla_camisa',array('size'=>11,'maxlength'=>11,'class'=>'form-control','placeholder'=>'Talla de Camisa', 'required'=>'required')); ?>
				</div>
				<?php echo $form->error($model,'talla_camisa',array('class'=>'alert alert-danger','style'=>'padding:6px;')); ?>
				<hr>

				<div class="form-group input-group">
					<span class="input-group-addon">
						<i class="fa fa-slack fa-fw"></i>
					</span>
					<?php echo $form->textField($model,'talla_pantalon',array('size'=>11,'maxlength'=>11,'class'=>'form-control','placeholder'=>'Talla de Pantalon', 'required'=>'required')); ?>
				</div>
				<?php echo $form->error($model,'talla_pantalon',array('class'=>'alert alert-danger','style'=>'padding:6px;')); ?>
				<hr>

				<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>
			</fieldset>
		</div>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->