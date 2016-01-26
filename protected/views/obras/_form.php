<?php
/* @var $this ObrasController */
/* @var $model Obras */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'obras-form',
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
				if($model->nombre_obra!=""){
					echo 'Modificar: '.$model->nombre_obra;
				}else{
					echo 'Nueva Obra';
				}
			
			?>
		</div>
		<div class="panel-body">
			<fieldset>
				
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('nombre_obra') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-building-o fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'nombre_obra',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Nombre de la Obra', 'title'=>'Indique el Nombre de la Obra.')); ?>
						<?php echo  $model->hasErrors('nombre_obra') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'nombre_obra'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('direccion') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<?php echo $form->textArea($model,'direccion',array('rows'=>6, 'cols'=>95,'size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>'Dirección', 'title'=>'Indique la direccion de la Obra.')); ?>
						<?php echo  $model->hasErrors('direccion') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'direccion'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('fech_ini') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php echo $form->dateField($model,'fech_ini',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Fecha de Inicio', 'title'=>'Indique la Fecha de Inicio de la Obra.')); ?>
						<?php echo  $model->hasErrors('fech_ini') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'fech_ini'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('fech_fin') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php echo $form->dateField($model,'fech_fin',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Fecha de Culminación', 'title'=>'Indique la Fecha de culminacion de la Obra.')); ?>
						<?php echo  $model->hasErrors('fech_fin') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'fech_fin'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('status') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-check fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($model, 'status', array(''=>'Estatus','0'=>'Inactiva', '1'=>'Activa'),array('class'=>'form-control', 'title'=>'Indique si la obra esta Activa o Inactiva.')); ?>
						<?php echo  $model->hasErrors('status') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'status'); ?>
				</div>


				<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>

			</fieldset>
		</div>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->