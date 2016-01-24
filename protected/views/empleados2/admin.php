<?php
/* @var $this EmpleadosController */
/* @var $model Empleados */

$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	'Gestionar',
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empleados-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'Nombre',
			'name'=>'persona_search',
			'value'=>'$data->persona->nombre'
		),
		array(
			'header'=>'Apellido',
			'name'=>'persona_search_2',
			'value'=>'$data->persona->apellido'
		),
		array(
			'header'=>'Obra',
			'name'=>'obra_search',
			'value'=>'$data->obra->nombre_obra'
		),
		'nro_cuenta',
		array(
			'header'=>'Empresa',
			'name'=>'empresa_search',
			'value'=>'$data->empresa->nombre_emp'
		),
		array(
			'header'=>'Talla Camisa',
			'name'=>'camisa_search',
			'value'=>'$data->talla->talla_camisa'
		),
		array(
			'header'=>'Talla Pantalon',
			'name'=>'pantalon_search',
			'value'=>'$data->talla->talla_pantalon'
		),
		array(
			'header'=>'Talla Zapato',
			'name'=>'zapato_search',
			'value'=>'$data->talla->talla_zapato'
		),
		/*
		'id_cargo',
		'cod_banco',
		'tipo_empleado',
		*/
		array(
            'class'=>'CButtonColumn',
            'htmlOptions'=>array('width'=>'75px'),
            'template'=>'{view}{update}{delete}',
			'buttons'=>array(
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
            ),
        ),
	),
)); ?>

<div class="col-sm-6">
    <div class="list-group">
      <a href="#" class="list-group-item active">
        Menú
      </a>
      <a href="index.php?r=empleados/create" class="list-group-item">Nuevo Empleado</a>
</div>
