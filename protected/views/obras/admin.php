<?php
/* @var $this ObrasController */
/* @var $model Obras */

$this->breadcrumbs=array(
	'Obras'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Nueva Obra', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'obras-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		'nombre_obra',
		'direccion',
		array(
			'header'=>'Fecha de Inicio',
			'name'=>'fech_ini',
			'value'=>function($data){
				return date("d-m-Y",strtotime($data->fech_ini));
			}
		),
		array(
			'header'=>'Fecha Fin',
			'name'=>'fech_fin',
			'value'=>function($data){
				return date("d-m-Y",strtotime($data->fech_fin));
			}
		),
		array(
			'header'=>'Estatus',
			'name'=>'status',
			'filter'=>CHtml::listData(Obras::getOnoffs(), 'id', 'title'),
			'value'=>function($data){
				if($data->status=='1')
					return "Activa";
				else
					return "Inactiva";
			}
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
      <a href="index.php?r=obras/create" class="list-group-item">Nueva obra</a>
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
