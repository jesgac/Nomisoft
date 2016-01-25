<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuario'=>array('admin'),
	$model->user,
);

$this->menu=array(
	array('label'=>'Nuevo Usuario', 'url'=>array('create')),
	array('label'=>'Modificar Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea borrar este registro?')),
	array('label'=>'Gestionar Usuarios', 'url'=>array('admin')),
);
?>

<div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        Usuario: <?php echo $model->user; ?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				array(
			'label'=>'Empleado',
			'value'=>$model->persona->nombre." ".$model->persona->apellido
		),	
		array(
			'label'=>'Tipo de Usuario',
			'value'=>function($data){
				if($data->nivel=='1')
					return "General";
				else
					if($data->nivel=='2')
						return "Impresión";
					else
						return "Administrador";
			}
		),
			),
		)); ?>
    </div>
</div>
