<?php
/* @var $this ImprimirController */
/* @var $model Imprimir */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Nómina'=>array('admin'),
	'Imprimir TXT',
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
			echo "Imprimir TXT";
		?>
	</div>
		<div class="panel-body">
			<fieldset>
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('fecha') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php echo $form->dateField($model,'fecha',array('class'=>'form-control','placeholder'=>'Fecha','title'=>'Indique fecha')); ?>
						<?php echo  $model->hasErrors('fecha') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'fecha'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('rif') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-barcode fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'rif',array('class'=>'form-control','placeholder'=>'Rif','title'=>'Indique Su Registro de Información Fiscal')); ?>
						<?php echo  $model->hasErrors('rif') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'rif'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $model->hasErrors('contrato') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-barcode fa-fw"></i>
						</span>
						<?php echo $form->textField($model,'contrato',array('class'=>'form-control','placeholder'=>'Nro. de Contrato','title'=>'Indique su Número de Contrato')); ?>
						<?php echo  $model->hasErrors('contrato') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($model,'contrato'); ?>
				</div>
			<?php echo CHtml::submitButton('Imprimir',array('class'=>'btn btn-primary btn-block')); ?>
			</fieldset>
		</div>
	</div>
	



<?php $this->endWidget(); ?>

</div><!-- form -->