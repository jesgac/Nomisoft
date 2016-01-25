<?php

class EmpleadosController extends Controller
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
		if( Yii::app()->user->getState('role') ==1)
        {
            $arr =array('create','update','autocomplete','admin','view');   // give all access to admin
        }else{
        	if( Yii::app()->user->getState('role') ==3)
        			$arr =array('create','update','autocomplete','admin','delete','view');   // give all access to admin
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
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
		$a=new Empleados;
   		$b=new Tallas;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empleados'],$_POST['Tallas']))
		{
			$a->attributes=$_POST['Empleados'];
			$b->attributes=$_POST['Tallas'];
			
			$valid=$a->validate();
			$valid=$b->validate() && $valid;
       		
       		if ($valid){
				$b->save(false);
				$a->id_talla = $b->id;
				$a->save(false);
				
				$this->redirect(array('admin'));
       		}

			/*if($model->save())
				$this->redirect(array('view','id'=>$model->id));*/
		}

		$this->render('create',array(
			'a'=>$a,
        	'b'=>$b,
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
   		$b = Tallas::model()->findByAttributes(array('id'=>$a->id_talla));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empleados'],$_POST['Tallas']))
		{
			$a->attributes=$_POST['Empleados'];
			$b->attributes=$_POST['Tallas'];
			
			$valid=$a->validate();
       		$valid=$b->validate() && $valid;
       		if ($valid){
				$b->save(false);
				$a->id_talla = $b->id;
				$a->save(false);
				
				$this->redirect(array('admin'));
       		}

			/*if($model->save())
				$this->redirect(array('view','id'=>$model->id));*/
		}

		$this->render('update',array(
			'a'=>$a,
        	'b'=>$b,
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
		$dataProvider=new CActiveDataProvider('Empleados');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Empleados('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Empleados']))
			$model->attributes=$_GET['Empleados'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionRecibo($id)
	{
		$this->render('recibo',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Empleados the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Empleados::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Empleados $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='empleados-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAutocomplete($term) 
{
 $criteria = new CDbCriteria;
 $criteria->compare('LOWER(apellido)', strtolower($_GET['term']), true);
 $criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true, 'OR');
 $criteria->order = 'apellido';
 $criteria->limit = 30;
 //$criteria->with('persona'); 
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

}
