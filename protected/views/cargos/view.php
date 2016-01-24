<?php
/* @var $this CargosController */
/* @var $model Cargos */

$this->breadcrumbs=array(
	'Cargos'=>array('admin'),
	$model->cargo,
);

$this->menu=array(
	array('label'=>'Nuevo Cargo', 'url'=>array('create')),
	array('label'=>'Modificar Cargo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Cargo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar este cargo?')),
	array('label'=>'Gestionar Cargo', 'url'=>array('admin')),
);
?>

<div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $model->cargo;?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				array(
			'label'=>'Sueldo',
			'value'=>function($data){
            	return number_format($data->sueldo, 2,',','.')." Bs.";
        	},
            'filter'=>$model,
		),
		array(
			'label'=>'Tipo de Sueldo',
			'value'=>function($data){
				if($data->tipo_sueldo=='1')
					return "Semanal";
				else
					return "Mensual";
			}
		),
			),
		)); ?>
    </div>
</div>
