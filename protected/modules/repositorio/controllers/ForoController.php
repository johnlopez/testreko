<?php

class ForoController extends Controller
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
				'actions'=>array('index','view','admin','BorradoFisicoForo'),
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
		$model = new Foro();
                $repositorio = Yii::app()->session['repositorio'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Foro']))
		{
			$model->attributes=$_POST['Foro'];
			if($model->agregarForo(
                                $repositorio->id,
                                $model->tema,
                                $model->descripcion,
                                $model->conclusion,
                                $model->tableSchema->name
                                
                        ))
				
                    $this->redirect(array('view','id'=>$model->lastInsertForoId));
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
		$model = $this->loadModel($id);
                $repositorio = Yii::app()->session['repositorio'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Foro']))
		{
			$model->attributes=$_POST['Foro'];
			if($model->modificarForo(
                                $model->id,
                                $repositorio->id,
                                $model->tema,
                                $model->descripcion,
                                $model->conclusion,
                                $model->tableSchema->name
                                
                            ))
				
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Foro');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Foro();
                //var_dump($model->getIP());
                // $ip = Yii::app()->request->userHostAddress;
                //  echo $ip;
                //print_r($_SERVER);
//                echo "REMOTE_ADDR: ".$_SERVER['REMOTE_ADDR']."<br>";
//                echo "SERVER_NAME: ".$_SERVER['SERVER_NAME']."<br>";
//                echo "REMOTE_PORT: ".$_SERVER['REMOTE_PORT']."<br>";
//                echo "HTTP_USER_AGENT: ".$_SERVER['HTTP_USER_AGENT']."<br>";
//                echo "HTTP_REFERER: ".$_SERVER['HTTP_REFERER']."<br>";
                $idRepositorio = Yii::app()->session['repositorio']->id;
		$listadoForos = $model->listarForosPorRepositorio($idRepositorio);

		$this->render('admin',array(
			'model'=>$model,
                        'listadoForos' => $listadoForos
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Foro the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Foro::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Foro $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='foro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionBorradoFisicoForo() {
            
             if(isset($_POST['id'])){
                    $idForo = $_POST['id'];
                }
                
                $model = new Foro();
                $model->eliminarFisicoForo($idForo);
                $this->redirect('admin');
        }
}
