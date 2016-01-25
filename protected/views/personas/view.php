<?php
/* @var $this PersonasController */
/* @var $model Personas */

$this->breadcrumbs=array(
	'Personas'=>array('admin'),
	$model->nombre.' '.$model->apellido,
);

$this->menu=array(
	array('label'=>'Nueva Persona', 'url'=>array('create')),
	array('label'=>'Modificar '.$model->nombre.' '.$model->apellido, 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar '.$model->nombre.' '.$model->apellido, 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Personas', 'url'=>array('admin')),
);
?>

 <div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $model->apellido.' '.$model->nombre;?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				'cedula',
				array(
					'label'=>'Fecha de Nacimiento',
					'value'=>function($data){
						return date("d-m-Y",strtotime($data->fecha_nac));
					}

					),
				'lugar_nac',
				'nacionalidad',
				'sexo',
				'direccion',
				'telefono',
				'email',
			),
		)); ?>
    </div>
</div>

