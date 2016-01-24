<?php
/* @var $this TallasController */
/* @var $model Tallas */

$this->breadcrumbs=array(
	'Tallas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Nueva Talla', 'url'=>array('create')),
	array('label'=>'Modificar Talla', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Talla', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea borrar este registro?')),
	array('label'=>'Gestionar Tallas', 'url'=>array('admin')),
);
?>

<div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo "Talla: ".$model->id?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				'talla_zapato',
			'talla_pantalon',
			'talla_camisa',
			),
		)); ?>
    </div>
</div>
