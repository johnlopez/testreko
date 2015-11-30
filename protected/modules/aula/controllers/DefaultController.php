<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
            $aula = new Aula();
            $idUsuario = Yii::app()->user->id;
            $listaDeRoles = $aula->listarRolesPorUsuario($idUsuario);
            $this->render('index', array('listaDeRoles' => $listaDeRoles));
	}
}