<?php
/* @var $this EvaluacionnoobjetivaController */
/* @var $model EvaluacionNoObjetiva */

$this->breadcrumbs=array(
	'Evaluacion No Objetivas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EvaluacionNoObjetiva', 'url'=>array('index')),
	array('label'=>'Manage EvaluacionNoObjetiva', 'url'=>array('admin')),
);
?>

<h1>Create EvaluacionNoObjetiva</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>