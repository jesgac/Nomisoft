 <?php
/* @var $this NominaController */
/* @var $model Nomina */

$this->breadcrumbs=array(
  'Nomina'=>array('admin'),
  'Gestionar',
);

$this->menu=array(
  array('label'=>'Nueva Nomina', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'nomina-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'itemsCssClass'=>'table table-striped table-hover table-bordered',
  'columns'=>array(
		array(
			'header'=>'Fecha',
			'name'=>'fecha',
			'value'=>function($data){
				return date("d-m-Y",strtotime($data->fecha));
			}
		),
    array(
      'header'=>'Empleado',
      'name'=>'id_empleado',
      'value'=>'$data->persona->nombre." ".$data->persona->apellido'
    ),
    array(
          'header'=>'Sueldo',
          'name'=>'neto',
          'value'=>function($data){
                  return number_format($data->cargo->sueldo, 2,',','.');
              },
          'htmlOptions'=>array('style' => 'text-align: right;')
    ),
    array(
          'header'=>'Total Asignaciones',
          'name'=>'total_asig',
          'value'=>function($data){
                  return number_format($data->total_asig, 2,',','.');
              },
          'htmlOptions'=>array('style' => 'text-align: right;')
    ),

    array(
          'header'=>'Total Deducciones',
          'name'=>'total_deduc',
          'value'=>function($data){
                  return number_format($data->total_deduc, 2,',','.');
              },
          'htmlOptions'=>array('style' => 'text-align: right;')
    ),
    array(
          'header'=>'Total Neto',
          'name'=>'neto',
          'value'=>function($data){
                  return number_format($data->neto, 2,',','.');
              },
          'htmlOptions'=>array('style' => 'text-align: right;')
    ),
		/*
		'vaciado',
		'prestamos',
		'otros',
		'descuento',
		*/
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
	  <a href="index.php?r=nomina/create" class="list-group-item">Nueva Nómina</a>
	  <a href="index.php?r=nomina/imprimir" class="list-group-item">Imprimir Reporte</a>
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
                'url'=>'Yii::app()->createUrl("nomina/recibo", array("id"=>$data->id))',
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
              'url'=>'Yii::app()->createUrl("nomina/recibo", array("id"=>$data->id))',
          ),
            
        );
    else
       return array(
          'ficha'=>array(
              'label'=>'',
              'imageUrl'=>'',
              'options'=>array('class'=>'fa fa-file-o  fa-fw'),
              'url'=>'Yii::app()->createUrl("nomina/recibo", array("id"=>$data->id))',
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
