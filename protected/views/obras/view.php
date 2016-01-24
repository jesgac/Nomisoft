<?php
/* @var $this ObrasController */
/* @var $model Obras */

$this->breadcrumbs=array(
	'Obras'=>array('admin'),
	$model->nombre_obra,
);

$this->menu=array(
	array('label'=>'Nueva Obra', 'url'=>array('create')),
	array('label'=>'Modificar Obra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Obras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar este registro?')),
	array('label'=>'Gestionar Obras', 'url'=>array('admin')),
);
?>

<div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $model->nombre_obra;?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				'direccion',
				array(
					'label'=>'Fecha de Inicio',
					'name'=>'fech_ini',
					'value'=>function($data){
						return date("d-m-Y",strtotime($data->fech_ini));
					}
				),
				array(
					'label'=>'Fecha Fin',
					'name'=>'fech_fin',
					'value'=>function($data){
						return date("d-m-Y",strtotime($data->fech_fin));
					}
				),
				array(
					'label'=>'Estatus',
					'value'=>function($data){
						if($data->status=='1')
							return "Activa";
						else
							return "Inactiva";
					}
				),
			),
		)); ?>
    </div>
</div>

