<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Glosarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Glosario', 'url'=>array('index')),
	array('label'=>'Manage Glosario', 'url'=>array('admin')),
);
?>

<h1>Create Glosario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>