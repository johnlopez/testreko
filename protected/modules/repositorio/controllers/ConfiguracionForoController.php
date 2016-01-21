<?php

class ConfiguracionForoController extends Controller
{
        
	public $layout='//layouts/column2';

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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','admin','BorradoFisicoConfiguracionForo'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
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
		$model = new ConfiguracionForo();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ConfiguracionForo']))
		{
			$model->attributes=$_POST['ConfiguracionForo'];
			if($model->agregarConfiguracion(
                                $model->cantidad_post,
                                $model->foro_id
                        ))
      
                        $this->redirect(array('view','id'=>$model->llaveConfiguracionForo));
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

		if(isset($_POST['ConfiguracionForo']))
		{
			$model->attributes=$_POST['ConfiguracionForo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ConfiguracionForo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            $model = new ConfiguracionForo();    
            
            if(isset($_POST['idForo'])){
                    $idForo = $_POST['idForo'];
                }
                
                
		$listarConfiguracion = $model->listarConfiguracionPorForo($idForo);

                
		$this->render('admin',array(
			'model'=>$model,
                        'listarConfiguracion' => $listarConfiguracion,
                        'idForo' => $idForo,
		));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ConfiguracionForo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ConfiguracionForo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ConfiguracionForo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='configuracion-foro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionBorradoFisicoConfiguracionForo() {
            
            if(isset($_POST['idConfiguracion'])){
                $idConfiguracion = $_POST['idConfiguracion'];
            }
            
            
            $configuracion = new ConfiguracionForo();
            $configuracion->eliminarFisicoConfiguracionForo($idConfiguracion);
            $this->redirect('admin');
        }
}
