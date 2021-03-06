<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */

$this->breadcrumbs=array(
	'Conceptos'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Nuevo Concepto', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'conceptos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		array(
			'header'=>'Fecha',
			'name'=>'Fecha',
			'value'=>function($data){
				return date("d-m-Y",strtotime($data->Fecha));
			}
		),

         array(
            //'id'=>'tipo_id',
            'name'=>'tipo_bono',
            'header'=>'Tipo de Concepto',
            'value'=>function($data){
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
                
            },
            /*'filter'=>CHtml::dropDownList('Cargos[tipo_sueldo]', '', 
                array(''=>'Todos','1' => 'Semanal', '2' => 'Mensual')
             ),*/
             'filter'=>CHtml::listData(Conceptos::getOnoffs(), 'id', 'title'),
        ),
		array('header'=>'Valor','name'=>'bono','value'=>'$data->bono'),
		array(
            'class'=>'CButtonColumn',
            'htmlOptions'=>buttonWidth(),
            'template'=>template(),
            'buttons'=>viewVisible()
        ),
	),
)); ?>

<div class="col-sm-6">
    <div class="list-group">
      <a href="#" class="list-group-item active">
        Menú
      </a>
      <a href="index.php?r=conceptos/create" class="list-group-item">Nuevo Conceptos</a>
</div>
<?php 
    function viewVisible(){
        return array(
                'view'=>array(
                    'label'=>'',
                    'imageUrl'=>'',
                    'options'=>array('class'=>'fa fa-search  fa-fw'),
                ),
                'update'=>array(
                    'label'=>'',
                    'imageUrl'=>'',
                    'options'=>array('class'=>'fa fa-pencil  fa-fw'),
                ),
                'delete'=>array(
                    'label'=>'',
                    'imageUrl'=>'',
                    'options'=>array('class'=>'fa fa-trash-o  fa-fw'),
                ),
            );
    }


    function template(){
        if (Yii::app()->user->getState('role') ==2)
            return '{view}{update}';
        else
            return '{view}{update}{delete}';
    }

    function buttonWidth(){
        return array('width'=>'80px');
        
    }
?>