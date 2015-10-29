<?php
/* @var $this ContenidolibreController */
/* @var $model ContenidoLibre */

$this->breadcrumbs=array(
	'Contenido Libres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContenidoLibre', 'url'=>array('index')),
	array('label'=>'Manage ContenidoLibre', 'url'=>array('admin')),
);
?>

<h1>Create ContenidoLibre</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>