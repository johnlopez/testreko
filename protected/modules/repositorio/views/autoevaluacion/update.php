<?php
/* @var $this AutoevaluacionController */
/* @var $model Autoevaluacion */

$this->breadcrumbs=array(
	'Autoevaluacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Autoevaluacion', 'url'=>array('index')),
	array('label'=>'Create Autoevaluacion', 'url'=>array('create')),
	array('label'=>'View Autoevaluacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Autoevaluacion', 'url'=>array('admin')),
);
?>

<h1>Update Autoevaluacion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>