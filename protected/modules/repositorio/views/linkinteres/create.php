<?php
/* @var $this LinkinteresController */
/* @var $model LinkInteres */

$this->breadcrumbs=array(
	'Link Interes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LinkInteres', 'url'=>array('index')),
	array('label'=>'Manage LinkInteres', 'url'=>array('admin')),
);
?>

<h1>Create LinkInteres</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>