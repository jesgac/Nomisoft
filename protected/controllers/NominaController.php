<?php

class NominaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		if( Yii::app()->user->getState('role') ==1 ||  Yii::app()->user->getState('role') ==3 )
        {
            $arr =array('create','update','pdf','reporte','recibo','admin','delete','view','imprimir');   // give all access to admin
        }else{
        	if( Yii::app()->user->getState('role') ==2)
        		$arr = array('admin','pdf','reporte','recibo','imprimir');
        }
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>$arr,
				'users'=>array('@'),
			),
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','batchUpdate','ficha'),
				'users'=>array('@'),
				
			),*/
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	//------------------------------------------------------------------------
	//------------------------------------------------------------------------
	//------------------------------------------------------------------------
	//------------------------------------------------------------------------
	public function actionCreate()
{
    $a=new Nomina;
    $b=new Asignaciones;
    $c=new Deducciones;
  
    if(isset($_POST['Nomina'],$_POST['Asignaciones'],$_POST['Deducciones']))
    {
        // populate input data to $a and $b
       $a->attributes=$_POST['Nomina'];
       $b->attributes=$_POST['Asignaciones'];
       $c->attributes=$_POST['Deducciones'];
       


        // validate BOTH $a and $b
        $valid=$a->validate();
        $valid=$b->validate() && $valid;
        $valid=$c->validate() && $valid;
        
        if($valid)
        {
       $b->feriado = $this->feriado($b->feriado,$a->id_empleado);
       $b->sabado = $this->sabado($b->sabado,$a->id_empleado);
       $b->b_alimenticio = $this->b_alimenticio($b->b_alimenticio,$a->id_empleado);
       $b->horasextra_diurna = $this->hdiurnas($b->horasextra_diurna,$a->id_empleado);
       $b->horasextras_nocturna = $this->hnocturnas($b->horasextras_nocturna,$a->id_empleado);
       $b->asistencia = $this->asistencia($b->asistencia,$a->id_empleado);
       
       $a->total_asig = $b->b_alimenticio +
       $b->asistencia + 
       $b->horasextra_diurna + 
       $b->horasextras_nocturna + 
       $b->sabado + 
       $b->feriado + 
       $a->prestamos + 
       $a->vaciado +
       $a->otros;

       $c->sso = $this->sso($c->sso,$a->id_empleado);
       $c->spf = $this->spf($c->spf,$a->id_empleado);
       $c->lph = $this->lph($c->lph,$a->id_empleado);
       $c->inasistencia = $this->inasistencia($c->inasistencia,$a->id_empleado);
       $a->total_deduc = $c->sso +
       $c->spf +
       $c->lph +
       $c->inasistencia +
       $a->descuento;

       $empleado = Empleados::model()->findByAttributes(array('id'=>$a->id_empleado));
	   $cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
       
       $a->neto = $cargo->sueldo + $a->total_asig - $a->total_deduc;

       

            // use false parameter to disable validation
	           $b->save(false);
	            $c->save(false);
	            $a->id_asignacion = $b->id;
	            $a->id_deduccion  = $c->id;

            	$a->save(false);
            	
            
            $this->redirect(array('admin'));
        }
    }
 
    $this->render('create', array(
        'a'=>$a,
        'b'=>$b,
        'c'=>$c,

    ));
}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$a=$this->loadModel($id);
		$b = Asignaciones::model()->findByAttributes(array('id'=>$a->id_asignacion));
		$c = Deducciones::model()->findByAttributes(array('id'=>$a->id_deduccion));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Nomina'],$_POST['Asignaciones'],$_POST['Deducciones']))
    {
        // populate input data to $a and $b
       $a->attributes=$_POST['Nomina'];
       $b->attributes=$_POST['Asignaciones'];
       $c->attributes=$_POST['Deducciones'];
       


        // validate BOTH $a and $b
        $valid=$a->validate();
        $valid=$b->validate() && $valid;
        $valid=$c->validate() && $valid;
        
        if($valid)
        {
       $b->feriado = $this->feriado($b->feriado,$a->id_empleado);
       $b->sabado = $this->sabado($b->sabado,$a->id_empleado);
       $b->b_alimenticio = $this->b_alimenticio($b->b_alimenticio,$a->id_empleado);
       $b->horasextra_diurna = $this->hdiurnas($b->horasextra_diurna,$a->id_empleado);
       $b->horasextras_nocturna = $this->hnocturnas($b->horasextras_nocturna,$a->id_empleado);
       $b->asistencia = $this->asistencia($b->asistencia,$a->id_empleado);
       
       $a->total_asig = $b->b_alimenticio +
       $b->asistencia + 
       $b->horasextra_diurna + 
       $b->horasextras_nocturna + 
       $b->sabado + 
       $b->feriado + 
       $a->prestamos + 
       $a->vaciado +
       $a->otros;

       $c->sso = $this->sso($c->sso,$a->id_empleado);
       $c->spf = $this->spf($c->spf,$a->id_empleado);
       $c->lph = $this->lph($c->lph,$a->id_empleado);
       $c->inasistencia = $this->inasistencia($c->inasistencia,$a->id_empleado);
       $a->total_deduc = $c->sso +
       $c->spf +
       $c->lph +
       $c->inasistencia +
       $a->descuento;

       $empleado = Empleados::model()->findByAttributes(array('id'=>$a->id_empleado));
	   $cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
       
       $a->neto = $cargo->sueldo + $a->total_asig - $a->total_deduc;

       

            // use false parameter to disable validation
	           $b->save(false);
	            $c->save(false);
	            $a->id_asignacion = $b->id;
	            $a->id_deduccion  = $c->id;

            	$a->save(false);
            	
            
            $this->redirect(array('admin'));
        }
    }
 
    $this->render('update', array(
        'a'=>$a,
        'b'=>$b,
        'c'=>$c,

    ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Nomina');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Nomina('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nomina']))
			$model->attributes=$_GET['Nomina'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionReporte(){
		$model = Nomina::model()->findAll();

		$this->renderPartial('reporte',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Nomina the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Nomina::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function actionPdf($id){
	
        
        $mPDF1 = Yii::app()->ePdf->mpdf();
 
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
 
        $mPDF1->WriteHTML($this->renderPartial('recibo', array('model'=>$this->loadModel($id)), true));
 		
        $mPDF1->Output();
	}

	/**
	 * Performs the AJAX validation.
	 * @param Nomina $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='nomina-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function feriado($dias,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>4));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes;
		$feriado = (($sueldo_diario* $concepto->bono) + $sueldo_diario) * $dias;
		return $feriado;
	}

	protected function sabado($dias,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>5));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes;
		$sabado = (($sueldo_diario* $concepto->bono) + $sueldo_diario) * $dias;
		return $sabado;
	}

	protected function b_alimenticio($dias){
		$ut = Conceptos::model()->findByAttributes(array('tipo_bono'=>1));
		$alimenticio = Conceptos::model()->findByAttributes(array('tipo_bono'=>6));
		$b_alimenticio = $ut->bono * $alimenticio->bono * $dias;
		return  $b_alimenticio;

	}

	protected function hdiurnas($horas,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>2));
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes; // determinar el seuldo diario
		$sueldo_horas =  $sueldo_diario / 8; //determinar la hora de trabajo
		

		$hdiurnas = (($sueldo_horas * $concepto->bono)+ $sueldo_horas) * $horas;
		return $hdiurnas;

	}

	protected function hnocturnas($horas,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>3));
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes; // determinar el seuldo diario
		$sueldo_horas =  $sueldo_diario / 7; //determinar la hora de trabajo
		
		$hdiurnas = (((($sueldo_horas * $concepto->bono) + $sueldo_horas) * 0.35) + (($sueldo_horas * $concepto->bono) + $sueldo_horas))*$horas;
		return $hdiurnas;

	}

	protected function sso($seguro,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		if ($seguro == 0)
			return $seguro;
		else {
			if ($cargo->tipo_sueldo == 1){
				$sueldo_mensual = $cargo->sueldo * 52 / 12;
			}else{
				$sueldo_mensual = $cargo->sueldo;
			}
			$sso = $sueldo_mensual * 0.04;
			return $sso;
		}
	}

	protected function spf($seguro,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		if ($seguro == 0)
			return $seguro;
		else {
			if ($cargo->tipo_sueldo == 1){
				$sueldo_mensual = $cargo->sueldo * 52 / 12;
			}else{
				$sueldo_mensual = $cargo->sueldo;
			}
			$spf = $sueldo_mensual * 0.005;
			return $spf;
		}
	}

	protected function lph($seguro,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		if ($seguro == 0)
			return $seguro;
		else {
			if ($cargo->tipo_sueldo == 1){
				$sueldo_mensual = $cargo->sueldo * 52 / 12;
			}else{
				$sueldo_mensual = $cargo->sueldo;
			}
			$lph = $sueldo_mensual * 0.01;
			return $lph;
		}
	}

	protected function inasistencia($dias,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));

		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes;
		$inasistencia = $sueldo_diario * $dias;
		return $inasistencia;

	}

	protected function asistencia($asistencia,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		if ($asistencia == 0)
			return $asistencia;
		else {
			if ($cargo->tipo_sueldo == 1){
				$semana_mes = 7;
			}else{
				$semana_mes = 30;
			}
			$sueldo_diario = $cargo->sueldo / $semana_mes;
			$asistencia = $sueldo_diario * 6;
			return $asistencia;
		}
	}

	public function actionAutocomplete($term) 
{
 $criteria = new CDbCriteria;
 $criteria->compare('LOWER(apellido)', strtolower($_GET['term']), true);
 $criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true, 'OR');
 $criteria->order = 'apellido';
 $criteria->with = array( 'empleados');
 $criteria->limit = 30; 
 $data = Personas::model()->findAll($criteria);

 if (!empty($data))
 {
  $arr = array();
  foreach ($data as $item) {
   $arr[] = array(
    'id' => $item->id,
    'value' => $item->nombre.' '.$item->apellido,
    'label' => $item->nombre.' '.$item->apellido,
   );
  }
 }
 else
 {
  $arr = array();
  $arr[] = array(
   'id' => '',
   'value' => 'No se han encontrado resultados para su búsqueda',
   'label' => 'No se han encontrado resultados para su búsqueda',
  );
 }
  
 echo CJSON::encode($arr);
}


public function actionRecibo($id)
{
	$this->renderPartial('recibo',array(
		'model'=>$this->loadModel($id),
	));
}

public function actionImprimir()
	{
		$model= new Imprimir;
	    if(isset($_POST['Imprimir']))
	    {
	        $model->attributes=$_POST['Imprimir'];
	        if($model->validate())
	        {
	        	$this->renderPartial('reporte',array('model'=>$model->fecha));				
		    	return true;
		    }
	    }
	    $this->render('imprimir',array('model'=>$model));

	}


}
