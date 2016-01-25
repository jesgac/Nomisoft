
<?php

$this->breadcrumbs=array(
	'Respaldos'=>array('index'),
	'Gestionar',
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'install-grid',
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'dataProvider' => $dataProvider,
	'columns' => array(
		array(
			'header'=>'Nombre de Archivo',
			'name'=>'name'
		),
		array(
			'header'=>'Tamaño',
			'name'=>'size'
		),
		array(
			'header'=>'Fecha de Creación',
			'name'=>'create_time'
		),
		array(
			'class' => 'CButtonColumn',
			'template' => ' {Descargar}',
			  'buttons'=>array
			    (
			        'Descargar' => array
			        (

			            'url'=>'Yii::app()->createUrl("backup/default/download", array("file"=>$data["name"]))',
			            'label'=>'',
	                    'imageUrl'=>'',
	                    'options'=>array('class'=>'fa fa-download  fa-fw'),
			        ),

			        
			    ),		
		),
		array(
			'class' => 'CButtonColumn',
			'template' => '{Eliminar}',
			  'buttons'=>array
			    (

			        'Eliminar' => array
			        (
			            'url'=>'Yii::app()->createUrl("backup/default/delete", array("file"=>$data["name"]))',
			            'label'=>'',
	                    'imageUrl'=>'',
	                    'options'=>array('class'=>'fa fa-trash  fa-fw'),
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
      <a href="index.php?r=backup/default/create" class="list-group-item">Respaldar BD</a>
</div>
