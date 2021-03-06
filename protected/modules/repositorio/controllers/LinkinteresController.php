<?php

class LinkinteresController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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
				'actions'=>array('index','view','admin','BorradoFisicoLinkInteres'),
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
		$model = new LinkInteres();
                $repositorio = Yii::app()->session['repositorio'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LinkInteres']))
		{
			$model->attributes=$_POST['LinkInteres'];
			if($model->agregarLinkInteres(
                                $repositorio->id,
                                $model->titulo,
                                $model->nombre,
                                $model->url,
                                $model->descripcion,
                                $model->tableSchema->name
                        ))
                            
                    var_dump($model->lastInsertLinkId);
                        
                        $this->redirect(array('view','id' => $model->lastInsertLinkId));
                        
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
                $repositorio = Yii::app()->session['repositorio'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LinkInteres']))
		{
			$model->attributes=$_POST['LinkInteres'];
			if($model->modificarLinkInteres(
                                $model->id,
                                $repositorio->id,
                                $model->titulo,
                                $model->nombre,
                                $model->url,
                                $model->descripcion 
                                
                        ))
                                
                        var_dump($model->lastInsertLinkId);        
                                
                        $this->redirect(array('view','id' => $model->id));
				
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
		$dataProvider=new CActiveDataProvider('LinkInteres');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new LinkInteres();
                $idRepositorio = Yii::app()->session['repositorio']->id;
		$listadoLink = $model->listarLinkInteresPorRepositorio($idRepositorio);

		$this->render('admin',array(
			'model'=>$model,
                        'listadoLink' => $listadoLink,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LinkInteres the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LinkInteres::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LinkInteres $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='link-interes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionBorradoFisicoLinkInteres() {
            
            if(isset($_POST['id'])){
                    $idLink = $_POST['id'];
                }
            
            $model = new LinkInteres();
            $model->eliminarFisicoLink($idLink);
            $this->redirect('admin');
        }
}
