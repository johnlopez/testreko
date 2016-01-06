<?php

class GlosarioController extends Controller
{
	public function actionListadoglosarios()
	{ 
                Yii::import('application.modules.repositorio.models.Repositorio');
                Yii::import('application.modules.repositorio.models.Modulo');
                Yii::import('application.modules.repositorio.models.Glosario');
                
                $modulo = new Modulo();
                $repositorio = new Repositorio();
                $repositorio = Yii::app()->session['repositorioaula']; 
                $glosario = new Glosario();
                
                if(isset($_POST['moduloId']))
                {
                    $modulo = $modulo->findByPk($_POST['moduloId']);
                    $glosarios = $glosario->listaGlosarioRepositorioAula($repositorio->id, $modulo->id);
                }                
		$this->render('listadoglosarios',array(
                        'glosarios'=>$glosarios,
                        'modulo'=>$modulo,
                ));
	}
        
        public function actionView()
        {
//                Yii::import('application.modules.repositorio.models.Glosario');
//                $glosario = new Glosario();
//                Yii::import('application.modules.repositorio.models.Modulo');
//                $modulo = new Modulo();
//                if(isset($_POST['glosarioId']))
//                {
//                    $glosarioId = $_POST['glosarioId'];
//                    $glosario = $glosario->findByPk($glosarioId);  
//                }
//                if(isset($_POST['moduloId']))
//                {
//                    $moduloId = $_POST['moduloId'];
//                    $modulo = $modulo->findByPk($moduloId);
//                }
//                $this->render('view',array(
//                        'glosario' => $glosario,
//                        'modulo'=>$modulo,
//                ));
//////////////////////////////////////////////////////////////////////////////////
                Yii::import('application.modules.repositorio.models.Repositorio');
                $repositorio = Yii::app()->session['repositorioaula'];
                Yii::import('application.modules.repositorio.models.Glosario');
                $glosario = new Glosario();
                Yii::import('application.modules.repositorio.models.GlosarioTerminoDefinicion');
                $glosarioTerminoDefinicion = new GlosarioTerminoDefinicion('myscenario');
                $glosarioTerminoDefinicionArray = Array();
                if(isset($_POST['glosarioId']))
                {
                    $glosarioId = $_POST['glosarioId'];
                    $glosario = $glosario->findByPk($glosarioId);  
                }
                $listaGlosarioTerminoDefinicion = $glosarioTerminoDefinicion->listaGlosarioTerminoDefinicion($glosario->id);
                
                foreach ($listaGlosarioTerminoDefinicion as $lista)
                {
                    $tmp = new GlosarioTerminoDefinicion('myscenario');
                    $tmp->id = $lista['id'];
                    $tmp->termino = $lista['termino'];
                    $tmp->definicion = $lista['definicion'];
                    $glosarioTerminoDefinicionArray[] = $tmp;
                }                
                $archivos = Yii::app()->ArchivoComponent->listarArchivo($glosario);
                                                
		$this->render('view',array(
			'glosario'=>$glosario,
                        'repositorio'=>$repositorio,
                        'glosarioTerminoDefinicion'=>$glosarioTerminoDefinicionArray,
                        'archivos'=>$archivos,                        
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