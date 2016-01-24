<?php
/* @var $this CargosController */
/* @var $model Cargos */

$this->breadcrumbs=array(
	'Cargos'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Nuevo Cargo', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cargos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		'cargo',
		'sueldo',
		/*array(
			'header'=>'Tipo de Sueldo',
			'value'=>function($data){
				if($data->tipo_sueldo=='1')
					return "Semanal";
				else
					return "Mensual";
			}
		),*/
		 array(
	        //'id'=>'tipo_id',
	        'name'=>'tipo_sueldo',
	        'header'=>'Tipo de Sueldo',
	        'value'=>function($data){
				if($data->tipo_sueldo=='1')
					return "Semanal";
				else
					return "Mensual";
			},
	        /*'filter'=>CHtml::dropDownList('Cargos[tipo_sueldo]', '', 
	            array(''=>'Todos','1' => 'Semanal', '2' => 'Mensual')
	         ),*/
		 	 'filter'=>CHtml::listData(Cargos::getOnoffs(), 'id', 'title'),
		),
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
      <a href="index.php?r=cargos/create" class="list-group-item">Nuevo Cargo</a>
</div>
<?php 
    function viewVisible(){
        if (Yii::app()->user->getState('role') ==3)
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
        else
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
                
            );

    }

    function template(){
        if (Yii::app()->user->getState('role') ==3)
            return '{view}{update}{delete}';
        else
            return '{view}{update}';
    }

    function buttonWidth(){
        if (Yii::app()->user->getState('role') ==3)
            return array('width'=>'80px');
        else
             return array('width'=>'auto');
    }
?>
