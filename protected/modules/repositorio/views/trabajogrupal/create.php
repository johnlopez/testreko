<?php
/* @var $this TrabajogrupalController */
/* @var $model TrabajoGrupal */

$this->breadcrumbs=array(
	'Trabajo Grupals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrabajoGrupal', 'url'=>array('index')),
	array('label'=>'Manage TrabajoGrupal', 'url'=>array('admin')),
);
?>

<h1>Create TrabajoGrupal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>