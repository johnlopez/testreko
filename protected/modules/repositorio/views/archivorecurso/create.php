<?php
/* @var $this ArchivorecursoController */
/* @var $model ArchivoRecurso */

$this->breadcrumbs=array(
	'Archivo Recursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArchivoRecurso', 'url'=>array('index')),
	array('label'=>'Manage ArchivoRecurso', 'url'=>array('admin')),
);
?>

<h1>Create ArchivoRecurso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>