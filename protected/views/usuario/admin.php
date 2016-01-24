<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Nuevo Usuario', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		array(
			'header'=>'Empleado',
			'name'=>'id_persona',
			'value'=>'$data->persona->nombre." ".$data->persona->apellido'
		),
		'user',
		array(
			'header'=>'Tipo de Usuario',
			'value'=>function($data){
				if($data->nivel=='1')
					return "General";
				else
					if($data->nivel=='2')
						return "General";
					else
						return "Administrador";
			}
		),
		array(
            'class'=>'CButtonColumn',
            'htmlOptions'=>array('width'=>'90px'),
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
      <a href="index.php?r=usuario/create" class="list-group-item">Nuevo Usuario</a>
</div>
