<?php
/* @var $this HijosController */
/* @var $model Hijos */

$this->breadcrumbs=array(
	'Hijos'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Nuevo Hijo', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'hijos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		array(
			'header'=>'Nombre Padre/Madre',
			'name'=>'persona_search',
			'value'=>'$data->persona->nombre'
		),
		array(
			'header'=>'Apellido Padre/Madre',
			'name'=>'persona_search_2',
			'value'=>'$data->persona->apellido'
		),
		'nombre',
		'apellido',
        array(
              'header'=>'Fecha de Nacimiento',
              'name'=>'fecha_nac',
              'value'=>function($data){
                return date("d-m-Y",strtotime($data->fecha_nac));
              }),



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
      <a href="index.php?r=hijos/create" class="list-group-item">Nuevo Hijo</a>
</div>
<?php 
    function viewVisible(){
        if (Yii::app()->user->getState('role') ==2)
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
        if (Yii::app()->user->getState('role') ==2)
            return array('width'=>'auto');
        else
            return array('width'=>'80px');
    }
?>
