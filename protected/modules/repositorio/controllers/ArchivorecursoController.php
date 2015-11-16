<?php

class ArchivorecursoController extends Controller
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
				'actions'=>array('index','view','upload','viewupload','download'),
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
		$model=new ArchivoRecurso;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ArchivoRecurso']))
		{
			$model->attributes=$_POST['ArchivoRecurso'];
			if($model->save())
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

		if(isset($_POST['ArchivoRecurso']))
		{
			$model->attributes=$_POST['ArchivoRecurso'];
			if($model->save())
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
		$dataProvider=new CActiveDataProvider('ArchivoRecurso');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ArchivoRecurso('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArchivoRecurso']))
			$model->attributes=$_GET['ArchivoRecurso'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ArchivoRecurso the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ArchivoRecurso::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ArchivoRecurso $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='archivo-recurso-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionUpload()
        {
            $model = new FormUpload();
            $msg = '';
            if(isset($_POST['FormUpload']))
            {
                $model->attributes=$_POST['FormUpload'];
                $images = CUploadedFile::getInstancesByName('images');
                if(count($images)===0)
                {
                    $msg = " No has seleccionado imagenes ";
                }
                elseif (!$model->validate()) 
                {
                    $msg = " Error al enviar el formulario";
                }
                else
                {
                    $institucinoNombre = Yii::app()->session['institucionNombre'];
                    $repositorio = Yii::app()->session['repositorio'];
                    var_dump($repositorio);
                    
                    $conexion = Yii::app()->db;
                    $username = Yii::app()->user->name;
                    $consulta = "SELECT id FROM ";
                    $consulta.= "usuario WHERE usuario = '$username'";
                    $resultado = $conexion->createCommand($consulta);
                    $query = $resultado->query();                    

                    foreach ($query as $fila)
                    {
                        $id_user = $fila['id'];
                    }
                    $folder = strtolower($model->title);
                    $buscar = array(    ' ','ñ','á','é','í','ó','ú','à','è','ì','ò','ù','ä','ë','ï','ö','ü');
                    $reemplazar = array('-','n','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u');
                    $folder = str_replace($buscar, $reemplazar, $folder);
                    $path = Yii::getPathOfAlias('webroot').'/reko-archivos/'.$institucinoNombre.'/'.'repositorio-id-'.$repositorio->id.'/';
                    // Si no existe la carpeta se crea
                    if(!is_dir($path))
                    {
                        mkdir($path,0,true);
                        chmod($path,0755);
                    }
                    // Guardar Imagenes
                    foreach($images as $image=>$i)
                    {
                        $aleatorio = rand(100000,999999);
                        //nombre de la imagen
                        $img = $aleatorio."-".$i->name;
                        $consulta = "INSERT INTO tbl_image ";
                        $consulta.= "(id_user,title,folder,image) ";
                        $consulta.= "VALUES ";
                        $consulta.= "('".$id_user."','".
                                $model->title."','".
                                $folder."','".
                                $img."')";
                        $resultado = $conexion->createCommand($consulta)->execute();
                        $i->saveAs($path.$img);                                
                    }
                }
            }
            
            $this->render('upload',array(
			'model'=>$model,
                        'msg'=>$msg,
                    )
            );
        }
        
        public function actionViewUpload()
        {
            $tblImage = new TblImage();
            $tblImage = $tblImage->findByPk(14);
            $this->render('viewupload',array(
                        'tblImage'=>$tblImage,
                    )
            );
        }
        
        public function actionDownload()
        {   
            if(isset($_POST['image']))
            {
                $image = $_POST['image'];
                if( file_exists( YiiBase::getPathOfAlias('webroot').'/reko-archivos/utem/repositorio-id-1/'.$image ) ){
                    Yii::app()->getRequest()->sendFile( $image, file_get_contents(YiiBase::getPathOfAlias('webroot').'/reko-archivos/utem/repositorio-id-1/'.$image ) );
                }
//                echo $_POST['image'];

            }
        }
        
}
