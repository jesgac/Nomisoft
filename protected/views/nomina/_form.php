<?php
/* @var $this NominaController */
/* @var $model Nomina */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nomina-form',
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
			echo $a->isNewRecord ? 'Nueva Nomina' : 'Modificar: '.$a->persona->nombre.' '.$a->persona->apellido
		?>
	</div>
		<div class="panel-body">
			<fieldset>
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('id_empleado') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-male fa-fw"></i>
						</span>
						<?php
						  echo $form->hiddenField($a,'id_empleado',array()); // Campo oculto para guardar el ID de la persona seleccionada
						  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						   array(
						    'name'=>'id_empleado', // Nombre para el campo de autocompletar
						    'model'=>$a,
						    'value'=>$a->isNewRecord ? '' : $a->persona->apellido.' '.$a->persona->nombre,
						    'source'=>$this->createUrl('nomina/autocomplete'), // URL que genera el conjunto de datos
						    'options'=> array(
						      'showAnim'=>'fold',
						      'size'=>'30',
						      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
						      'select'=>"js:function(event, ui) { 
						       $('#Nomina_id_empleado').val(ui.item.id); // HTML-Id del campo
						       }"
						      ),
						    'htmlOptions'=> array(
						    'class'=>'form-control',
						     'size'=>60,
						     'placeholder'=>'Buscar Trabajador...',
						     'title'=>'Indique el trabajador.'
						     ),
						   ));  
						 ?>
						<?php echo  $a->hasErrors('id_empleado') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'id_empleado'); ?>
				</div>
				
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('fecha') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar fa-fw"></i>
						</span>
						<?php echo $form->dateField($a,'fecha',array('class'=>'form-control','placeholder'=>'Fecha','title'=>'Indique fecha')); ?>
						<?php echo  $a->hasErrors('fecha') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'fecha'); ?>
				</div>
				<hr>
				<div class="form-group input-group col-sm-12<?php echo $b->hasErrors('asistencia') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($b, 'asistencia', array(''=>'Asistencia','0'=>'No', '1'=>'Si'),array('class'=>'form-control','title'=>'Indique con Si o No el cumplimento del Bono de Asistencia.')); ?>
						<?php echo  $b->hasErrors('asistencia') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($b,'asistencia'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $b->hasErrors('b_alimenticio') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($b,'b_alimenticio',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Bono Alimenticio', 'title'=>'Indique la cantidad de dias Trabajados, Bono Alimenticio.')); ?>
						<?php echo  $b->hasErrors('b_alimenticio') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($b,'b_alimenticio'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $b->hasErrors('feriado') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($b,'feriado',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Feriado', 'title'=>'Indique la cantidad de dias Feriados Trabajados.')); ?>
						<?php echo  $b->hasErrors('feriado') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($b,'feriado'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $b->hasErrors('horasextra_diurna') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($b,'horasextra_diurna',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Horas Extras Diurnas','title'=>'Indique la cantidad Horas Extras Diurnas Trabajadas.')); ?>
						<?php echo  $b->hasErrors('horasextra_diurna') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($b,'horasextra_diurna'); ?>
				</div>

				<div class="form-group input-group col-sm-12<?php echo $b->hasErrors('horasextras_nocturna') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($b,'horasextras_nocturna',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Horas Extras Nocturnas', 'title'=>'Indique la cantidad Horas Extras Nocturnas Trabajadas.')); ?>
						<?php echo  $b->hasErrors('horasextras_nocturna') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($b,'horasextras_nocturna'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('prestamos') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($a,'prestamos',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Prestamos', 'title'=>'Ingrese la cantidad de prestamo')); ?>
						<?php echo  $a->hasErrors('prestamos') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'prestamos'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $b->hasErrors('sabado') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($b,'sabado',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Sabado', 'title'=>'Indique monto a pagar por Sabado')); ?>
						<?php echo  $b->hasErrors('sabado') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($b,'sabado'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('vaciado') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($a,'vaciado',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Vaciado', 'title'=>'Indique el monto a pagar por Vaciado.')); ?>
						<?php echo  $a->hasErrors('vaciado') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'vaciado'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('otros') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($a,'otros',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Varios', 'title'=>'Indique el monto a pagar por Varios.')); ?>
						<?php echo  $a->hasErrors('otros') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'otros'); ?>
				</div>
				<hr>

				
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('descuento') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($a,'descuento',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Descuentos', 'title'=>'Indique el monto a Descontar.')); ?>
						<?php echo  $a->hasErrors('descuento') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'descuento'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $c->hasErrors('lph') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($c, 'lph', array(''=>'FAOV','0'=>'No', '1'=>'Si'),array('class'=>'form-control','title'=>'Indique con SI o NO el descuento por Fondo de Ahorro Obligatorio para la Vivienda.' )); ?>
						<?php echo  $c->hasErrors('lph') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($c,'lph'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $c->hasErrors('inasistencia') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->textField($c,'inasistencia',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Inasistencia', 'title'=>'Indique Cantidad de dias de Inasistencia.')); ?>
						<?php echo  $c->hasErrors('inasistencia') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($c,'inasistencia'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $c->hasErrors('spf') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($c, 'spf', array(''=>'SPF','0'=>'No', '1'=>'Si'),array('class'=>'form-control', 'title'=>'Indique con SI o NO el descuento por Seguro Paro Forzoso.')); ?>
						<?php echo  $c->hasErrors('spf') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($c,'spf'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $c->hasErrors('sso') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($c, 'sso', array(''=>'SSO','0'=>'No', '1'=>'Si'),array('class'=>'form-control', 'title'=>'Indique con SI o NO el descuento por Seguro Social Obligatorio.')); ?>
						<?php echo  $c->hasErrors('sso') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($c,'sso'); ?>
				</div>

				<?php echo CHtml::submitButton($a->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
			</fieldset>
		</div>
</div>
		
	

<?php $this->endWidget(); ?>



</div><!-- form -->