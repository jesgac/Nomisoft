<?php
/* @var $this PersonasController */
/* @var $model Personas */

$this->breadcrumbs=array(
	'Personas'=>array('admin'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Nueva Persona', 'url'=>array('create')),
	array('label'=>'Actualizar Todos', 'url'=>array('batchUpdate')),
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personas-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'apellido',

    array(
          'header'=>'Cedula',
          'name'=>'cedula',
          'value'=>function($data){
                  return number_format($data->cedula, 0,',','.');
              },
        ),
		array(
      'header'=>'Fecha de Nacimiento',
      'name'=>'fecha_nac',
      'value'=>function($data){
        return date("d-m-Y",strtotime($data->fecha_nac));
      }),
		'lugar_nac',
    /*
		'nacionalidad',
		'sexo',
		'direccion',
		'telefono',
		'email',*/
		
		array(
        'class'=>'CButtonColumn',
        'htmlOptions'=>buttonWidth(),
        'template'=>template(),
        'buttons'=>viewVisible()
    ),
  ),
)); 
//print_r($model->empleados->id);
?>

<div class="col-sm-6">
    <div class="list-group">
      <a href="#" class="list-group-item active">
        Menú
      </a>
      <a href="index.php?r=personas/create" class="list-group-item">Nueva Persona</a>
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
            'ficha'=>array(
                'label'=>'',
                'imageUrl'=>'',
                'options'=>array('class'=>'fa fa-file-o  fa-fw'),
                'url'=>'Yii::app()->createUrl("personas/ficha", array("id"=>$data->id))',
            ),
        );
    elseif (Yii::app()->user->getState('role') ==1)
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
          'ficha'=>array(
              'label'=>'',
              'imageUrl'=>'',
              'options'=>array('class'=>'fa fa-file-o  fa-fw'),
              'url'=>'Yii::app()->createUrl("personas/ficha", array("id"=>$data->id))',
          ),
            
        );
    else
       return array(
          'ficha'=>array(
              'label'=>'',
              'imageUrl'=>'',
              'options'=>array('class'=>'fa fa-file-o  fa-fw'),
              'url'=>'Yii::app()->createUrl("personas/ficha", array("id"=>$data->id))',
          ),
            
        ); 
        
}

  function template(){
      if (Yii::app()->user->getState('role') ==3)
          return '{view}{update}{delete}{ficha}';
      elseif (Yii::app()->user->getState('role') ==1)
          return '{view}{update}{ficha}';
      else
          return '{ficha}';
  }

  function buttonWidth(){
      if (Yii::app()->user->getState('role') ==3)
          return array('width'=>'90px');
      elseif (Yii::app()->user->getState('role') ==1)
          return array('width'=>'75px');
      else
          return array('width'=>'50px');

  }
?>
