<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */

$this->breadcrumbs=array(
	'Conceptos'=>array('admin'),
	tipo($model),
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
        <?php echo tipo($model);?>
    </div>
    <div class="panel-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-striped'),
			'attributes'=>array(
				'Fecha',
			array(
            //'id'=>'tipo_id',
            'label'=>'Tipo de Concepto',
            'value'=>tipo($model),
               
        ),
			'bono',
			),
		)); ?>
    </div>
</div>
<?php 
function tipo($data){
	if($data->tipo_bono=='1')
                    return "Unidad Tributaria";
                if($data->tipo_bono=='2')
                    return "Horas Extras Diurna";
                if($data->tipo_bono=='3')
                    return "Horas Extras Nocturna";
                if($data->tipo_bono=='4')
                    return "Feriado";
                if($data->tipo_bono=='5')
                    return "Sabado";
                if($data->tipo_bono=='6')
                    return "Bono Alimentacion";
                if($data->tipo_bono=='7')
                    return "Seguro Social Obligatorio";
                if($data->tipo_bono=='8')
                    return "Seguro Paro Forzoso";
                if($data->tipo_bono=='9')
                    return "Fondo de Ahorro Obligatorio para la Vivienda";

}


 ?>
