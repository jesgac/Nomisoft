<?php

class CargosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $modelo='Cargos';
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
            $arr =array('create','update','admin','view','delete');   // give all access to admin
        }else{
        	if( Yii::app()->user->getState('role') ==2)
        		$arr = array('admin','create','update','view');
        	else 
        		$arr = array('');
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
		date_default_timezone_set('America/Caracas');
		$auditoria = new Auditoria;
		$auditoria->id_user=Yii::app()->user->getId();
		$auditoria->accion=1;
		$auditoria->modelo=$this->modelo;
		$auditoria->id_registro=$id;
		$auditoria->fecha=date("Y-m-d h:i:s"); 
		$auditoria->save(false);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cargos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cargos']))
		{
			$model->attributes=$_POST['Cargos'];
			if($model->save())
				date_default_timezone_set('America/Caracas');
				$auditoria = new Auditoria;
				$auditoria->id_user=Yii::app()->user->getId();
				$auditoria->accion=2;
				$auditoria->modelo=$this->modelo;
				$auditoria->id_registro=$model->id;
				$auditoria->fecha=date("Y-m-d h:i:s"); 
				$auditoria->save(false);

				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cargos']))
		{
			$model->attributes=$_POST['Cargos'];
			if($model->save())
				date_default_timezone_set('America/Caracas');
				$auditoria = new Auditoria;
				$auditoria->id_user=Yii::app()->user->getId();
				$auditoria->accion=3;
				$auditoria->modelo=$this->modelo;
				$auditoria->id_registro=$model->id;
				$auditoria->fecha=date("Y-m-d h:i:s"); 
				$auditoria->save(false);
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		date_default_timezone_set('America/Caracas');
		$auditoria = new Auditoria;
		$auditoria->id_user=Yii::app()->user->getId();
		$auditoria->accion=4;
		$auditoria->modelo=$this->modelo;
		$auditoria->id_registro=$id;
		$auditoria->fecha=date("Y-m-d h:i:s"); 
		$auditoria->save(false);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cargos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cargos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cargos']))
			$model->attributes=$_GET['Cargos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cargos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cargos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cargos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cargos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	
}
