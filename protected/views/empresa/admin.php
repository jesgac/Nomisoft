<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'List Empresa', 'url'=>array('index')),
	array('label'=>'Create Empresa', 'url'=>array('create')),
);


?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empresa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		'nombre_emp',
		'direccion',
		'telefono',
		'rif',
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
      <a href="index.php?r=empresa/create" class="list-group-item">Nueva Empresa</a>
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