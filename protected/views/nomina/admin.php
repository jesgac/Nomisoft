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
      'name'=>'persona_search',
      'value'=>'$data->persona->nombre." ".$data->persona->apellido'
    ),
    array(
          'header'=>'Sueldo',
          'name'=>'sueldo_search',
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
  //the dialog
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
'id'=>'dlg-address-view',
'options'=>array(
    'title'=>'',
    'autoOpen'=>false, //important!
    'modal'=>false,
    'width'=>640,
    'height'=>640,
),
));
?>
<div id="id_view"></div>
<?php $this->endWidget();?>

<?php 
  function viewVisible(){
    if (Yii::app()->user->getState('role') ==2)
       return array(
          'ficha'=>array(
              'url'=>'Yii::app()->createUrl("nomina/recibo", array("id"=>$data->id,"asDialog"=>1))',
              'label'=>'',
              'imageUrl'=>'',
              'options'=>array(  
                'ajax'=>array(
                  'type'=>'POST',
                  // ajax post will use 'url' specified above 
                  'url'=>"js:$(this).attr('href')", 
                  'update'=>'#id_view',
                ),
                'class'=>'fa fa-file-o fa-fw'
              ),
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
            /*'ficha'=>array(
                'label'=>'',
                'imageUrl'=>'',
                'options'=>array('class'=>'fa fa-file-o  fa-fw'),
                'url'=>'Yii::app()->createUrl("nomina/recibo", array("id"=>$data->id))',
            ),*/
            'ficha'=>array(
              'url'=>'Yii::app()->createUrl("nomina/recibo", array("id"=>$data->id,"asDialog"=>1))',
              'label'=>'',
              'imageUrl'=>'',
              'options'=>array(  
                'ajax'=>array(
                  'type'=>'POST',
                  // ajax post will use 'url' specified above 
                  'url'=>"js:$(this).attr('href')", 
                  'update'=>'#id_view',
                ),
                'class'=>'fa fa-file-o fa-fw'
              ),
            ),

            
        ); 
        
}

  function template(){
      if (Yii::app()->user->getState('role') ==2)
          return '{ficha}';
      else
          return '{view}{update}{delete}{ficha}';
  }

  function buttonWidth(){
      if (Yii::app()->user->getState('role') ==2)
      
          return array('width'=>'50px');
      else
          return array('width'=>'90px');

  }
?>
