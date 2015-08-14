<?php
/* @var $this RepositorioTroncalAppController */
/* @var $model RepositorioTroncalApp */

$this->breadcrumbs=array(
	'Repositorio Troncal Apps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RepositorioTroncalApp', 'url'=>array('index')),
	array('label'=>'Manage RepositorioTroncalApp', 'url'=>array('admin')),
);
?>

<h1>Create RepositorioTroncalApp</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>