<?php
/* @var $this NominaController */
/* @var $model Nomina */

$this->breadcrumbs=array(
	'Nomina'=>array('admin'),
	$model->persona->nombre." ".$model->persona->apellido,
);

$this->menu=array(
	array('label'=>'Nueva Nomina', 'url'=>array('create')),
	array('label'=>'Modificar Nomina', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Nomina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea borrar este registro?')),
	array('label'=>'Gestionar Nominas', 'url'=>array('admin')),
);
?>

<div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        Detalle Nomina: <?php echo $model->persona->nombre.' '.$model->persona->apellido;?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				array(
					'label'=>'Sueldo',
					'value'=>function($data){
		            	return number_format($data->cargo->sueldo, 2,',','.')." Bs.";
        			},
				),
		array(
			'label'=>'Bono Alimenticio',
			'value'=>function($data){
            	return number_format($data->asig->b_alimenticio, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Bono Asistencia',
			'value'=>function($data){
            	return number_format($data->asig->asistencia, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Dias Feriados',
			'value'=>function($data){
            	return number_format($data->asig->feriado, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Sabados Trabajados',
			'value'=>function($data){
            	return number_format($data->asig->sabado, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Horas Extras Diurnas',
			'value'=>function($data){
            	return number_format($data->asig->horasextra_diurna, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Horas Extras Nocturnas',
			'value'=>function($data){
            	return number_format($data->asig->horasextras_nocturna, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Vaciado',
			'value'=>function($data){
            	return number_format($data->vaciado, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Prestamos',
			'value'=>function($data){
            	return number_format($data->prestamos, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Otros',
			'value'=>function($data){
            	return number_format($data->otros, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Seguro Social Obligatorio',
			'value'=>function($data){
            	return number_format($data->deduc->sso, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Seguro Paro Forzoso',
			'value'=>function($data){
            	return number_format($data->deduc->spf, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Ley de Política Habitacional',
			'value'=>function($data){
            	return number_format($data->deduc->lph, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Inasistencia',
			'value'=>function($data){
            	return number_format($data->deduc->inasistencia, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Descuento',
			'value'=>function($data){
            	return number_format($data->descuento, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'TOTAL ASISGNACIONES',
			'value'=>function($data){
            	return number_format($data->total_asig, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'TOTAL DEDUCCIONES',
			'value'=>function($data){
            	return number_format($data->total_deduc, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Neto a Pagar',
			'value'=>function($data){
            	return number_format($data->neto, 2,',','.')." Bs.";
        	},
		),
		array(
			'label'=>'Fecha',
			'value'=>function($data){
				return date("d-m-Y",strtotime($data->fecha));
			}
		),
			),
		)); ?>
    </div>
</div>

<?php echo CHtml::link('Imprimir Recibo',array('recibo','id'=>$model->id)); ?>
