<?php
/* @var $this RecepciontrabajoController */
/* @var $model RecepcionTrabajo */

$this->breadcrumbs=array(
	'Recepcion Trabajos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RecepcionTrabajo', 'url'=>array('index')),
	array('label'=>'Manage RecepcionTrabajo', 'url'=>array('admin')),
);
?>

<h1>Create RecepcionTrabajo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>