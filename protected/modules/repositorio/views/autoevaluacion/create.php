<?php
/* @var $this AutoevaluacionController */
/* @var $model Autoevaluacion */

$this->breadcrumbs=array(
	'Autoevaluacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Autoevaluacion', 'url'=>array('index')),
	array('label'=>'Manage Autoevaluacion', 'url'=>array('admin')),
);
?>

<h1>Create Autoevaluacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>