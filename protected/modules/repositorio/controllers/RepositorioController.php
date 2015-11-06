<?php

class RepositorioController extends Controller
{
	public function actionAdminRepositorio()
	{
            if(isset(Yii::app()->session['institucionId']))
            {
                $institucionId = Yii::app()->session['institucionId'];                
                $modeloRepositorio = new Repositorio();
                $repositorios = $modeloRepositorio->listaRepositorioInstitucion($institucionId);
		$this->render('adminrepositorio',array('repositorios'=>$repositorios));
            }
        }
        
        public function actionSeleccionHerramienta(){
            
            $modeloRepositorio = new Repositorio();
            if(isset($_POST['repositorioId']))
            {              
                $repositorio = $modeloRepositorio->findByPk($_POST['repositorioId']);
                Yii::app()->session['repositorio'] = $repositorio;                
                $repositorioSessions = Yii::app()->session['repositorio'];
                               
                $herramientasDisponibles = $modeloRepositorio->obtenerHerramientasDisponiblesRepositorio($repositorio->id);                
                $this->render('seleccionherramienta',
                        array(
                            'herramientasDisponibles'=>$herramientasDisponibles,
                            ));
            }           
        }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}