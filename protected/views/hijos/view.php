<?php
/* @var $this HijosController */
/* @var $model Hijos */

$this->breadcrumbs=array(
	'Hijos'=>array('admin'),
	$model->nombre." ".$model->apellido,
);

$this->menu=array(
	array('label'=>'Nuevo Hijo', 'url'=>array('create')),
	array('label'=>'Modificar Hijo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Hijo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de que desea borrar este registro?')),
	array('label'=>'Gestionar Hijos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nombre." ".$model->apellido; ?></h1>

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
				array(
			   'label'=>'Padre/Madre',
			   'value'=>$model->persona->nombre." ".$model->persona->apellido
				),
			   'fecha_nac',
			),
		)); ?>
    </div>
</div>

