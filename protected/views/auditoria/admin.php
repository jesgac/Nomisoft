<?php
/* @var $this AuditoriaController */
/* @var $model Auditoria */

$this->breadcrumbs=array(
	'Bitacora'=>array('admin'),
	'Registros',
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auditoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-hover table-bordered',
	'columns'=>array(
		//'id',
		//'id_user',
		array(
			'header'=>'Usuario',
			'name'=>'id_user',
			'value'=>'$data->usuario->user'
		),
		//'accion',
		array(
            //'id'=>'tipo_id',
            'name'=>'accion',
            'header'=>'Accion',
            'value'=>function($data){
                if($data->accion=='1')
                    return "View";
                if($data->accion=='2')
                    return "Create";
                if($data->accion=='3')
                    return "Update";
                if($data->accion=='4')
                    return "Delete";
                if($data->accion=='5')
                    return "Ficha";
                if($data->accion=='6')
                    return "Recibo";
                if($data->accion=='7')
                    return "Imprimir";
                if($data->accion=='8')
                    return "TXT";

               
                
            },
            /*'filter'=>CHtml::dropDownList('Cargos[tipo_sueldo]', '', 
                array(''=>'Todos','1' => 'Semanal', '2' => 'Mensual')
             ),*/
             'filter'=>CHtml::listData(Auditoria::getOnoffs(), 'id', 'title'),
        ),
		'id_registro',
		'modelo',
		'fecha',
	),
)); ?>
