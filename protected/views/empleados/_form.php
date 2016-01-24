<?php
/* @var $this EmpleadosController */
/* @var $a Empleados */
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
				if($a->id!=""){
					echo 'Modificar Empleado: '.$a->persona->nombre.' '.$a->persona->apellido;
				}else{
					echo 'Nuevo Empleado';
				}
			
			?>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('id_persona') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-male fa-fw"></i>
						</span>
						<?php
						  echo $form->hiddenField($a,'id_persona',array()); // Campo oculto para guardar el ID de la persona seleccionada
						  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						   array(
						    'name'=>'id_persona', // Nombre para el campo de autocompletar
						    'model'=>$a,
						    'value'=>$a->isNewRecord ? '' : $a->persona->apellido.' '.$a->persona->nombre,
						    'source'=>$this->createUrl('Empleados/autocomplete'), // URL que genera el conjunto de datos
						    'options'=> array(
						      'showAnim'=>'fold',
						      'size'=>'30',
						      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
						      'select'=>"js:function(event, ui) { 
						       $('#Empleados_id_persona').val(ui.item.id); // HTML-Id del campo
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
						<?php echo  $a->hasErrors('id_persona') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>	
					</div>
					<?php echo $form->error($a,'id_persona'); ?>
				</div>
				


				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('id_obra') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-building-o fa-fw"></i>
						</span>
						<?php
						  echo $form->hiddenField($a,'id_obra',array()); // Campo oculto para guardar el ID de la persona seleccionada
						  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						   array(
						    'name'=>'id_obra', // Nombre para el campo de autocompletar
						    'model'=>$a,
						    'value'=>$a->isNewRecord ? '' : $a->obra->nombre_obra,
						    'source'=>$this->createUrl('obras/autocomplete'), // URL que genera el conjunto de datos
						    'options'=> array(
						      'showAnim'=>'fold',
						      'size'=>'30',
						      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
						      'select'=>"js:function(event, ui) { 
						       $('#Empleados_id_obra').val(ui.item.id); // HTML-Id del campo
						       }"
						      ),
						    'htmlOptions'=> array(
						     'size'=>60,
						     'class'=>'form-control',
						     'placeholder'=>'Buscar Obra...',
						     'title'=>'Indique la persona que tendrá la reunión.'
						     ),
						   ));  
						 ?>
						<?php echo  $a->hasErrors('id_obra') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'id_obra'); ?>
				</div>
				
				
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('nro_cuenta') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-bank fa-fw"></i>
						</span>
						<?php echo $form->textField($a,'nro_cuenta',array('size'=>20,'maxlength'=>20,'class'=>'form-control','placeholder'=>'Cuenta')); ?>
						<?php echo  $a->hasErrors('nro_cuenta') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'nro_cuenta'); ?>
				</div>
				
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('cod_banco') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-bank fa-fw"></i>
						</span>
						
						<?php echo $form->dropDownList($a, 'cod_banco', array(
							''=>'Seleccione un Banco',
							'0116'=>'BANCO OCCIDENTAL DE DESCUENTO BANCO UNIVERSAL, C.A. S.A.C.A',
							'0001'=>'BANCO CENTRAL DE VENEZUELA',
							'0003'=>'BANCO INDUSTRIAL DE VENEZUELA, C.A.',
							'0008'=>'BANCO GUAYANA, C.A.',
							'0102'=>'BANCO DE VENEZUELA S.A.C.A. BANCO UNIVERSAL',
							'0104'=>'VENEZOLANO DE CRÉDITO, S.A. BANCO UNIVERSAL',
							'0105'=>'BANCO MERCANTIL, C.A. S.A.C.A. BANCO UNIVERSAL',
							'0108'=>'BANCO PROVINCIAL, S.A. BANCO UNIVERSAL',
							'0114'=>'BANCO DEL CARIBE, C.A. BANCO UNIVERSAL',
							'0115'=>'BANCO EXTERIOR, C.A. BANCO UNIVERSAL',
							'0121'=>'CORP BANCA , C.A. BANCO UNIVERSAL',
							'0128'=>'BANCO CARONI, C.A. BANCO UNIVERSAL',
							'0134'=>'BANESCO BANCO UNIVERSAL S.A.C.A.',
							'0137'=>'BANCO SOFITASA BANCO UNIVERSAL, C.A.',
							'0138'=>'BANCO PLAZA, C.A.',
							'0146'=>'BANCO DE LA GENTE EMPRENDEDORA BANGENTE, C.A.',
							'0149'=>'BANCO DEL PUEBLO SOBERANO, C.A. BANCO DE DESARROLLO',
							'0151'=>'BFC BANCO FONDO COMUN C.A. BANCO UNIVERSAL',
							'0156'=>'100% BANCO, BANCO COMERCIAL, C.A.',
							'0157'=>'DEL SUR BANCO UNIVERSAL, C.A.',
							'0163'=>'BANCO DEL TESORO, C.A. BANCO UNIVERSAL',
							'0166'=>'BANCO AGRICOLA DE VENEZUELA, C.A. BANCO UNIVERSAL',
							'0168'=>'BANCRECER S.A. BANCO DE DESARROLLO',
							'0169'=>'MI BANCO, BANCO DE DESARROLLO, C.A.',
							'0171'=>'BANCO ACTIVO, C.A. BANCO COMERCIAL',
							'0173'=>'BANCO INTERNACIONAL DE DESARROLLO, C.A.',
							'0174'=>'BANPLUS BANCO COMERCIAL, C.A.',
							'0175'=>'BANCO BICENTENARIO BANCO UNIVERSAL, C.A.',
							'0190'=>'CITIBANK N.A.',
							'0191'=>'BANCO NACIONAL CRÉDITO, C.A. BANCO UNIVERSAL',
							'0601'=>'INSTITUTO MUNICIPAL DE CRÉDITO POPULAR',
						),array('class'=>'form-control')); ?>
						<?php echo  $a->hasErrors('cod_banco') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'cod_banco'); ?>
				</div>
				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('id_empresa') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-briefcase fa-fw"></i>
						</span>
						<?php
						  echo $form->hiddenField($a,'id_empresa',array()); // Campo oculto para guardar el ID de la persona seleccionada
						  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						   array(
						    'name'=>'id_empresa', // Nombre para el campo de autocompletar
						    'model'=>$a,
						    'value'=>$a->isNewRecord ? '' : $a->empresa->nombre_emp,
						    'source'=>$this->createUrl('empresa/autocomplete'), // URL que genera el conjunto de datos
						    'options'=> array(
						      'showAnim'=>'fold',
						      'size'=>'30',
						      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
						      'select'=>"js:function(event, ui) { 
						       $('#Empleados_id_empresa').val(ui.item.id); // HTML-Id del campo
						       }"
						      ),
						    'htmlOptions'=> array(
						     'size'=>60,
						     'class'=>'form-control',
						     'placeholder'=>'Buscar Empresa...',
						     'title'=>'Indique la persona que tendrá la reunión.'
						     ),
						   ));  
						 ?>
						<?php echo  $a->hasErrors('id_empresa') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'id_empresa'); ?>
				</div>
				
				
				<div class="form-group input-group">
					<span class="input-group-addon">
						<i class="fa fa-slack fa-fw"></i>
					</span>
					<?php echo $form->textField($b,'talla_zapato',array('size'=>11,'maxlength'=>11,'class'=>'form-control','placeholder'=>'Talla de Zapato')); ?>
				</div>
				<?php echo $form->error($b,'talla_zapato',array('class'=>'alert alert-danger','style'=>'padding:6px;')); ?>
				

				<div class="form-group input-group">
					<span class="input-group-addon">
						<i class="fa fa-slack fa-fw"></i>
					</span>
					<?php echo $form->textField($b,'talla_camisa',array('size'=>11,'maxlength'=>11,'class'=>'form-control','placeholder'=>'Talla de Camisa')); ?>
				</div>
				<?php echo $form->error($b,'talla_camisa',array('class'=>'alert alert-danger','style'=>'padding:6px;')); ?>
				

				<div class="form-group input-group">
					<span class="input-group-addon">
						<i class="fa fa-slack fa-fw"></i>
					</span>
					<?php echo $form->textField($b,'talla_pantalon',array('size'=>11,'maxlength'=>11,'class'=>'form-control','placeholder'=>'Talla de Pantalon')); ?>
				</div>
				<?php echo $form->error($b,'talla_pantalon',array('class'=>'alert alert-danger','style'=>'padding:6px;')); ?>
				
				

				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('id_cargo') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-graduation-cap fa-fw"></i>
						</span>
						<?php
						  echo $form->hiddenField($a,'id_cargo',array()); // Campo oculto para guardar el ID de la persona seleccionada
						  $this->widget('zii.widgets.jui.CJuiAutoComplete',
						   array(
						    'name'=>'id_cargo', // Nombre para el campo de autocompletar
						    'model'=>$a,
						    'value'=>$a->isNewRecord ? '' : $a->cargo->cargo,
						    'source'=>$this->createUrl('cargos/autocomplete'), // URL que genera el conjunto de datos
						    'options'=> array(
						      'showAnim'=>'fold',
						      'size'=>'30',
						      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
						      'select'=>"js:function(event, ui) { 
						       $('#Empleados_id_cargo').val(ui.item.id); // HTML-Id del campo
						       }"
						      ),
						    'htmlOptions'=> array(
						     'size'=>60,
						     'class'=>'form-control',
						     'placeholder'=>'Buscar Cargo...',
						     'title'=>'Indique la persona que tendrá la reunión.'
						     ),
						   ));  
						 ?>
						<?php echo  $a->hasErrors('id_cargo') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>
					</div>
					<?php echo $form->error($a,'id_cargo'); ?>
				</div>
				
				
				
				

				<div class="form-group input-group col-sm-12<?php echo $a->hasErrors('tipo_empleado') ? ' has-error' : ''; ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-wrench fa-fw"></i>
						</span>
						<?php echo $form->dropDownList($a, 'tipo_empleado', array(
							''=>'Seleccione un Tipo',
							'1'=>'Obrero',
							'2'=>'Empleado'
						),array('class'=>'form-control')); ?>
					<?php echo  $a->hasErrors('tipo_empleado') ? "<span class='input-group-addon danger'><span class='glyphicon glyphicon-remove'></span></span>" : ''?>	
					</div>
					<?php echo $form->error($a,'tipo_empleado'); ?>
				</div>
				

				<div class="form-group">
				<?php echo CHtml::submitButton($a->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary btn-block')); ?>
				</div>

			</fieldset>
		</div>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->