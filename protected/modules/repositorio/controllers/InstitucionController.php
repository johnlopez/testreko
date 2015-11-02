<?php

class InstitucionController extends Controller
{
	public function actionIndex()
	{ 
                $session=new CHttpSession;
                $session->open();
                $value1=$session['usuario_id'];  // get session variable 'name1'
                var_dump($value1);


                $modeloInstitucion = new Institucion();
                $institucion = $modeloInstitucion->findAll();
                $this->render('index',array('institucion'=>$institucion));
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