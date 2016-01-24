<?php
/* @var $this EmpleadosController */
/* @var $model Empleados */

$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	$model->persona->nombre.' '.$model->persona->apellido,
);

?>

<div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $model->persona->apellido.' '.$model->persona->nombre;?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				array(
					'label'=>'Cargo',
					'value'=>$model->cargo->cargo,
				),
				array(
					'label'=>'Tipo Empleado',
					'value'=>function($data){
						if ($data->tipo_empleado=='1')
							return 'Obrero';
						if ($data->tipo_empleado=='2')
							return 'Empleado';
					}
				),
				array(
					'label'=>'Obra',
					'value'=>$model->obra->nombre_obra,
				),
				array(
					'label'=>'Empresa',
					'value'=>$model->empresa->nombre_emp,
				),
				'nro_cuenta',
				array(
					'label'=>'Banco',
					'value'=>function($data){
						if ($data->cod_banco =='0001')
							return 'BANCO CENTRAL DE VENEZUELA';
						if ($data->cod_banco =='0003')
							return 'BANCO INDUSTRIAL DE VENEZUELA, C.A.';
						if ($data->cod_banco =='0008')
							return 'BANCO GUAYANA, C.A.';
						if ($data->cod_banco =='0102')
							return 'BANCO DE VENEZUELA S.A.C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0104')
							return 'VENEZOLANO DE CRÉDITO, S.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0105')
							return 'BANCO MERCANTIL, C.A. S.A.C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0108')
							return 'BANCO PROVINCIAL, S.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0114')
							return 'BANCO DEL CARIBE, C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0115')
							return 'BANCO EXTERIOR, C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0116')
							return 'BANCO OCCIDENTAL DE DESCUENTO BANCO UNIVERSAL, C.A. S.A.C.A';
						if ($data->cod_banco =='0121')
							return 'CORP BANCA , C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0128')
							return 'BANCO CARONI, C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0134')
							return 'BANESCO BANCO UNIVERSAL S.A.C.A.';
						if ($data->cod_banco =='0137')
							return 'BANCO SOFITASA BANCO UNIVERSAL, C.A.';
						if ($data->cod_banco =='0138')
							return 'BANCO PLAZA, C.A.';
						if ($data->cod_banco =='0146')
							return 'BANCO DE LA GENTE EMPRENDEDORA BANGENTE, C.A.';
						if ($data->cod_banco =='0149')
							return 'BANCO DEL PUEBLO SOBERANO, C.A. BANCO DE DESARROLLO';
						if ($data->cod_banco =='0151')
							return 'BFC BANCO FONDO COMUN C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0156')
							return '100% BANCO, BANCO COMERCIAL, C.A.';
						if ($data->cod_banco =='0157')
							return 'DEL SUR BANCO UNIVERSAL, C.A.';
						if ($data->cod_banco =='0163')
							return 'BANCO DEL TESORO, C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0166')
							return 'BANCO AGRICOLA DE VENEZUELA, C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0168')
							return 'BANCRECER S.A. BANCO DE DESARROLLO';
						if ($data->cod_banco =='0169')
							return 'MI BANCO, BANCO DE DESARROLLO, C.A.';
						if ($data->cod_banco =='0171')
							return 'BANCO ACTIVO, C.A. BANCO COMERCIAL';
						if ($data->cod_banco =='0173')
							return 'BANCO INTERNACIONAL DE DESARROLLO, C.A.';
						if ($data->cod_banco =='0174')
							return 'BANPLUS BANCO COMERCIAL, C.A.';
						if ($data->cod_banco =='0175')
							return 'BANCO BICENTENARIO BANCO UNIVERSAL, C.A.';
						if ($data->cod_banco =='0190')
							return 'CITIBANK N.A.';
						if ($data->cod_banco =='0191')
							return 'BANCO NACIONAL CRÉDITO, C.A. BANCO UNIVERSAL';
						if ($data->cod_banco =='0601')
							return 'INSTITUTO MUNICIPAL DE CRÉDITO POPULAR';
					}
				),
				array(
					'label'=>'Talla Camisa',
					'value'=>$model->talla->talla_camisa,
				),
				array(
					'label'=>'Talla Pantalón',
					'value'=>$model->talla->talla_pantalon,
				),
				array(
					'label'=>'Talla Zapato',
					'value'=>$model->talla->talla_zapato,
				),
				
			),
		)); ?>
    </div>
</div>


