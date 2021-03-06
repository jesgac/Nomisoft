<?php

class NominaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $modelo='Nomina';

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
            $arr =array('create','update','pdf','reporte','recibo','admin','delete','view','imprimir','txt');   // give all access to admin
        }else{
        	if( Yii::app()->user->getState('role') ==2)
        		$arr = array('admin','pdf','reporte','recibo','imprimir','txt');
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
		$a=$this->loadModel($id);
		$b = Asignaciones::model()->findByAttributes(array('id'=>$a->id_asignacion));
		$c = Deducciones::model()->findByAttributes(array('id'=>$a->id_deduccion));
		$this->render('view',array(
			'a'=>$a,
        	'b'=>$b,
        	'c'=>$c,
		));
		date_default_timezone_set('America/Caracas');
		$auditoria = new Auditoria;
		$auditoria->id_user=Yii::app()->user->getId();
		$auditoria->accion=1;
		$auditoria->modelo=$this->modelo;
		$auditoria->id_registro=$id;
		$auditoria->fecha=date("Y-m-d h:i:s"); 
		$auditoria->save(false);

	}

	public function actionTxt(){
		$model=new Txt;
		 if(isset($_POST['Txt']))
	    {
	        $model->attributes=$_POST['Txt'];
	        if($model->validate())
	        {
				$criteria = new CDbCriteria;
				$criteria->with=array('empleado','persona','cargo');
				$criteria->condition='fecha=:fecha AND empleado.nro_cuenta!=""';
				$criteria->params = array(':fecha'=>$model->fecha);
				$nomina = Nomina::model()->findAll($criteria);
				$this->render('txt',array(
					'nomina'=>$nomina,
					'model'=>$model
	        	));
	        	date_default_timezone_set('America/Caracas');
				$auditoria = new Auditoria;
				$auditoria->id_user=Yii::app()->user->getId();
				$auditoria->accion=8;
				$auditoria->modelo=$this->modelo;
				$auditoria->id_registro=0;
				$auditoria->fecha=date("Y-m-d h:i:s"); 
				$auditoria->save(false);
	        				
		    	return true;
		    }
	    }
		
		$this->render('txt_form',array(
			'model'=>$model,
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
          
       $a->total_asig = $a->b_alimenticio($b->b_alimenticio,$a->id_empleado) +
       $a->asistencia($b->asistencia,$a->id_empleado) + 
       $a->hdiurnas($b->horasextra_diurna,$a->id_empleado) + 
       $a->hnocturnas($b->horasextras_nocturna,$a->id_empleado) + 
       $a->sabado($b->sabado,$a->id_empleado) + 
       $a->feriado($b->feriado,$a->id_empleado) + 
       $a->prestamos + 
       $a->vaciado +
       $a->otros;

       $a->total_deduc = $a->sso($c->sso,$a->id_empleado) +
       $a->spf($c->spf,$a->id_empleado) +
       $a->lph($c->lph,$a->id_empleado) +
       $a->inasistencia($c->inasistencia,$a->id_empleado) +
       $a->descuento;

       $empleado = Empleados::model()->findByAttributes(array('id'=>$a->id_empleado));
	   $cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
      
       if ($cargo->tipo_sueldo == 1){
			$a->neto = $cargo->sueldo + $a->total_asig - $a->total_deduc;
		}else{
			$a->neto =( $cargo->sueldo /2 )+ $a->total_asig - $a->total_deduc;
		}

       

            // use false parameter to disable validation
	           $b->save(false);
	            $c->save(false);
	            $a->id_asignacion = $b->id;
	            $a->id_deduccion  = $c->id;

            	$a->save(false);

            	date_default_timezone_set('America/Caracas');
				$auditoria = new Auditoria;
				$auditoria->id_user=Yii::app()->user->getId();
				$auditoria->accion=2;
				$auditoria->modelo=$this->modelo;
				$auditoria->id_registro=$a->id;
				$auditoria->fecha=date("Y-m-d h:i:s"); 
				$auditoria->save(false);
            	
            
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
          
       $a->total_asig = $a->b_alimenticio($b->b_alimenticio,$a->id_empleado) +
       $a->asistencia($b->asistencia,$a->id_empleado) + 
       $a->hdiurnas($b->horasextra_diurna,$a->id_empleado) + 
       $a->hnocturnas($b->horasextras_nocturna,$a->id_empleado) + 
       $a->sabado($b->sabado,$a->id_empleado) + 
       $a->feriado($b->feriado,$a->id_empleado) + 
       $a->prestamos + 
       $a->vaciado +
       $a->otros;

       $a->total_deduc = $a->sso($c->sso,$a->id_empleado) +
       $a->spf($c->spf,$a->id_empleado) +
       $a->lph($c->lph,$a->id_empleado) +
       $a->inasistencia($c->inasistencia,$a->id_empleado) +
       $a->descuento;

       $empleado = Empleados::model()->findByAttributes(array('id'=>$a->id_empleado));
	   $cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
       
       if ($cargo->tipo_sueldo == 1){
			$a->neto = $cargo->sueldo + $a->total_asig - $a->total_deduc;
		}else{
			$a->neto =( $cargo->sueldo /2 )+ $a->total_asig - $a->total_deduc;
		}




       

            // use false parameter to disable validation
	           $b->save(false);
	            $c->save(false);
	            $a->id_asignacion = $b->id;
	            $a->id_deduccion  = $c->id;

            	$a->save(false);

            	date_default_timezone_set('America/Caracas');
				$auditoria = new Auditoria;
				$auditoria->id_user=Yii::app()->user->getId();
				$auditoria->accion=3;
				$auditoria->modelo=$this->modelo;
				$auditoria->id_registro=$a->id;
				$auditoria->fecha=date("Y-m-d h:i:s"); 
				$auditoria->save(false);
            	
            
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

/*public function actionRecibo($id)
{
		$a=$this->loadModel($id);
		$b = Asignaciones::model()->findByAttributes(array('id'=>$a->id_asignacion));
		$c = Deducciones::model()->findByAttributes(array('id'=>$a->id_deduccion));
		$this->renderPartial('recibo',array(
			'a'=>$a,
        	'b'=>$b,
        	'c'=>$c,
		));
}*/

public function actionRecibo($id)
{
    if (Yii::app()->request->isAjaxRequest)
    {
        //outputProcessing = true because including css-files ...
        $a=$this->loadModel($id);
		$b = Asignaciones::model()->findByAttributes(array('id'=>$a->id_asignacion));
		$c = Deducciones::model()->findByAttributes(array('id'=>$a->id_deduccion));
        $this->renderPartial('recibo', 
            array(
	            'a'=>$a,
		        'b'=>$b,
		        'c'=>$c,
             ),false,true);
        date_default_timezone_set('America/Caracas');
		$auditoria = new Auditoria;
		$auditoria->id_user=Yii::app()->user->getId();
		$auditoria->accion=6;
		$auditoria->modelo=$this->modelo;
		$auditoria->id_registro=$a->id;
		$auditoria->fecha=date("Y-m-d h:i:s"); 
		$auditoria->save(false);
        //js-code to open the dialog    
          if (!empty($_GET['asDialog'])) 
            echo CHtml::script('$("#dlg-address-view").dialog("open")');
        Yii::app()->end();
    }
    else
        $this->render('ficha', array(
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
	        	$this->renderPartial('reporte',array('model'=>$model->fecha,));
	        	date_default_timezone_set('America/Caracas');
				$auditoria = new Auditoria;
				$auditoria->id_user=Yii::app()->user->getId();
				$auditoria->accion=7;
				$auditoria->modelo=$this->modelo;
				$auditoria->id_registro=0;
				$auditoria->fecha=date("Y-m-d h:i:s"); 
				$auditoria->save(false);				
		    	return true;
		    }
	    }
	    $this->render('imprimir',array('model'=>$model));

	}




}
