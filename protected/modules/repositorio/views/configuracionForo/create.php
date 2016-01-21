<?php
/* @var $this ConfiguracionForoController */
/* @var $model ConfiguracionForo */

$this->breadcrumbs=array(
	'Configuracion Foros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfiguracionForo', 'url'=>array('index')),
	array('label'=>'Manage ConfiguracionForo', 'url'=>array('admin')),
);
?>

<h1>Create ConfiguracionForo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>