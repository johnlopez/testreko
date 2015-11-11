<?php

class GlosarioController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
                $repositorio = Yii::app()->session['repositorio'];
                
                $glosario = new Glosario();
                $glosarioTerminoDefinicion = new GlosarioTerminoDefinicion('myscenario');
                $glosarioTerminoDefinicionArray = Array();
                
                $listaGlosarioTerminoDefinicion = $glosarioTerminoDefinicion->listaGlosarioTerminoDefinicion($id);
                
                foreach ($listaGlosarioTerminoDefinicion as $lista)
                {
                    $tmp = new GlosarioTerminoDefinicion('myscenario');
                    $tmp->id = $lista['id'];
                    $tmp->termino = $lista['termino'];
                    $tmp->definicion = $lista['definicion'];
                    $glosarioTerminoDefinicionArray[] = $tmp;
                }
                                
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'repositorio'=>$repositorio,
                        'glosarioTerminoDefinicion'=>$glosarioTerminoDefinicionArray,
                        
		));
//		//////////SOLO GlOSARIO///////////////////////////////////////////////////
//                $repositorio = Yii::app()->session['repositorio'];
//		$this->render('view',array(
//			'model'=>$this->loadModel($id),
//                        'repositorio'=>$repositorio
//                        
//		));
//		//////////ORIGINAL///////////////////////////////////////////////////
//		$this->render('view',array(
//			'model'=>$this->loadModel($id),
//		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
                $modeloGlosario = new Glosario();
                $glosario = $modeloGlosario;
                $repositorio = Yii::app()->session['repositorio'];
                $glosarioTerminoDefinicion = new GlosarioTerminoDefinicion();
                
                if(isset($_POST['Glosario']))
                {                    
                    $modeloGlosario->attributes = $_POST['Glosario'];
                    $glosario = $modeloGlosario;
                                   
                    if($modeloGlosario->agregarGlosarioRepositorio(
                            $repositorio->id,
                            $glosario->nombre,
                            $glosario->descripcion
                    ))
                    {
                        $this->redirect(array('view','id'=>$modeloGlosario->lastInsertGlosarioId));
                    }
                }
                
                $this->render('create',array(
                    'glosario'=>$glosario,
                    'repositorio'=>$repositorio,
                    'glosarioTerminoDefinicion' => $glosarioTerminoDefinicion,
                ));
//		$model=new Glosario;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Glosario']))
//		{
//			$model->attributes=$_POST['Glosario'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $glosario = $this->loadModel($id);
            $repositorio = Yii::app()->session['repositorio'];
            $glosarioTerminoDefinicion = new GlosarioTerminoDefinicion();
            $glosarioTerminoDefinicionArray = Array();
            
            $listaGlosarioTerminoDefinicion = $glosarioTerminoDefinicion->listaGlosarioTerminoDefinicion($id);
            
            foreach ($listaGlosarioTerminoDefinicion as $lista)
            {
                $tmp = new GlosarioTerminoDefinicion();
                $tmp->id = $lista['id'];
                $tmp->termino = $lista['termino'];
                $tmp->definicion = $lista['definicion'];
                $glosarioTerminoDefinicionArray[] = $tmp;
            }
            
            if(isset($_POST['Glosario']))
		{
                    echo "hola";
			$glosario->attributes=$_POST['Glosario'];
			if($glosario->modificarGlosarioRepositorio(
                                $glosario->id,
                                $repositorio->id,
                                $glosario->nombre,
                                $glosario->descripcion
                        )){
                            $this->redirect(array('view','id'=>$glosario->lastInsertGlosarioId));
                        }
		}
            
            $this->render('update',array(
                'glosario'=>$glosario,
                'repositorio'=>$repositorio,
                'glosarioTerminoDefinicion'=>$glosarioTerminoDefinicionArray,
            ));
            
                
//		$model=$this->loadModel($id);
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Glosario']))
//		{
//			$model->attributes=$_POST['Glosario'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
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
                $glosario = new Glosario();
                $repositorio = Yii::app()->session['repositorio'];
                
                $glosarios = $glosario->listaGlosarioRepositorio($repositorio->id);
                $this->render('index',array(
			'glosarios'=>$glosarios,
                        'repositorio'=>$repositorio,
		));
//		$dataProvider=new CActiveDataProvider('Glosario');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                $modeloGlosario = new Glosario();                
                $glosarios = $modeloGlosario->listaGlosarioRepositorio(Yii::app()->session['repositorio']->id);
                $repositorio = Yii::app()->session['repositorio'];
                $this->render('admin',array(
                        'glosarios'=>$glosarios,
                        'repositorio'=>$repositorio,
		));
//		$model=new Glosario('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['Glosario']))
//			$model->attributes=$_GET['Glosario'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Glosario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Glosario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Glosario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='glosario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
