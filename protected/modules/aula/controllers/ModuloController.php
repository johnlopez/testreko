<?php

class ModuloController extends Controller
{
	public function actionListadorepositorios()
	{
                Yii::import('application.modules.repositorio.models.ModuloHasRepositorio');
                $moduloHasRepositorio = new ModuloHasRepositorio();
                Yii::import('application.modules.repositorio.models.Modulo');
                $modulo = new Modulo();
                
                if(isset($_POST['moduloId']))
                {                    
                    $modulo = $modulo->findByPk($_POST['moduloId']);  
                }
                
                $repositorios = $moduloHasRepositorio->listaModuloRepositorioAula($modulo->id);
		               
                $this->render('listadorepositorios',array(
			'repositorios'=>$repositorios,
                        'modulo'=>$modulo,
		));
	}
        
        public function actionSeleccionherramienta()
	{
            
            Yii::import('application.modules.repositorio.models.Modulo');
            $modulo = new Modulo();
            Yii::import('application.modules.repositorio.models.Repositorio');
            $repositorio = new Repositorio();
            
            if(isset($_POST['repositorioId']))
            {              
                $repositorio = $repositorio->findByPk($_POST['repositorioId']);
//                var_dump($repositorio);
                Yii::app()->session['repositorioaula'] = $repositorio;
//                var_dump(Yii::app()->session['repositorioaula']);
//                echo Yii::app()->session['repositorioaula']->nombre;
//                echo Yii::app()->session['repositorioaula']->descripcion;


//                $repositorioS = Yii::app()->session['repositorioaula'];
//                var_dump($repositorioS);  
                $herramientasDisponibles = $repositorio->obtenerHerramientasDisponiblesRepositorio($repositorio->id);                   
            }  
            if(isset($_POST['moduloId']))
            {
                $modulo = $modulo->findByPk($_POST['moduloId']);
            }
            $this->render('seleccionherramienta',array(
                    'herramientasDisponibles'=>$herramientasDisponibles,
                    'modulo'=>$modulo,
            ));
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