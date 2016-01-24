<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */

$this->breadcrumbs=array(
	'Conceptos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Create Conceptos', 'url'=>array('create')),
	array('label'=>'Update Conceptos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Conceptos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Conceptos', 'url'=>array('admin')),
);
?>

<div class="block-fluid">                        
	<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $model->tipo_bono;?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				'Fecha',
			'tipo_bono',
			'bono',
			),
		)); ?>
    </div>
</div>
