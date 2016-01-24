<?php
/* @var $this TallasController */
/* @var $model Tallas */

$this->breadcrumbs=array(
	'Tallas'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Nueva Talla', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tallas-grid',
	'dataProvider'=>$model->search(),
    'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		'talla_zapato',
		'talla_pantalon',
		'talla_camisa',
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
      <a href="index.php?r=tallas/create" class="list-group-item">Nueva Talla</a>
</div>
