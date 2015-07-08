<?php
/* @var $this EscritorioUsuarioController */
/* @var $model EscritorioUsuario */

$this->breadcrumbs=array(
	'Escritorio Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EscritorioUsuario', 'url'=>array('index')),
	array('label'=>'Manage EscritorioUsuario', 'url'=>array('admin')),
);
?>

<h1>Create EscritorioUsuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>