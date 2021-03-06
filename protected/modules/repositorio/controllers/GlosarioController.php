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
				'actions'=>array('index','view','agregararchivoglosario','descargararchivoglosario','eliminararchivoglosario'),
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
                
                $glosario = $glosario->findByPk($id);
                $archivos = Yii::app()->ArchivoComponent->listarArchivo($glosario);
                                                
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'repositorio'=>$repositorio,
                        'glosarioTerminoDefinicion'=>$glosarioTerminoDefinicionArray,
                        'archivos'=>$archivos,
                        
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
                            $glosario
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
            
            $glosario = $glosario->findByPk($id);
            $archivos = Yii::app()->ArchivoComponent->listarArchivo($glosario);
            
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
                'archivos'=>$archivos,
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
        
        public function actionAgregararchivoglosario()
        {
            $repositorio = Yii::app()->session['repositorio'];

            $glosario = new Glosario();
            if(isset($_POST['glosarioId']))
            {
                $glosario = $glosario->findByPk($_POST['glosarioId']);
            }
            Yii::import('application.models.SubidaArchivoForm');            
            $model = new SubidaArchivoForm();
                       
            if(isset($_POST['Glosario']))
            {
                $glosario->id = $_POST['Glosario']['id'];
                $glosario = $glosario->findByPk($glosario->id);

//                $model->attributes=$_POST['SubidaArchivoForm'];
                
                Yii::app()->ArchivoComponent->agregarArchivo($glosario);
                $this->redirect(array('view','id'=>$glosario->id));
            }
            $this->render('agregararchivoglosario',array(
                        'model'=>$model,
                        'glosario'=>$glosario,
                        'repositorio'=>$repositorio,
            ));
        }
        
        public function actionDescargararchivoglosario()
        {   
            Yii::import('application.models.Archivo');
            $archivo = new Archivo();
            if(isset($_POST['archivoId']))
            {
                $archivo = $archivo->findByPk($_POST['archivoId']);
                Yii::app()->ArchivoComponent->descargarArchivo($archivo);
//                if( file_exists( YiiBase::getPathOfAlias('webroot').$archivo->ruta.$archivo->nombre) ){
//                    Yii::app()->getRequest()->sendFile( $archivo->nombre, file_get_contents(YiiBase::getPathOfAlias('webroot').$archivo->ruta.$archivo->nombre ) );
//                }
            }
        }
        
        public function actionEliminararchivoglosario()
        {
            Yii::import('application.models.Archivo');
            $archivo = new Archivo();
            if(isset($_POST['archivoId'],$_POST['glosarioId']))
            {
                $archivo = $archivo->findByPk($_POST['archivoId']);
//                var_dump($archivo);
                echo Yii::app()->ArchivoComponent->eliminarArchivo($archivo);
                $this->redirect(array('update','id'=>$_POST['glosarioId']));
//                unlink(Yii::getPathOfAlias('webroot').$archivo->ruta.$archivo->nombre); 
            }
        }
        
       
}
