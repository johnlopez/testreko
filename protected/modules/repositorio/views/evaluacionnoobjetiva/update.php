<?php
/* @var $this EvaluacionnoobjetivaController */
/* @var $model EvaluacionNoObjetiva */

$this->breadcrumbs=array(
	'Evaluacion No Objetivas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvaluacionNoObjetiva', 'url'=>array('index')),
	array('label'=>'Create EvaluacionNoObjetiva', 'url'=>array('create')),
	array('label'=>'View EvaluacionNoObjetiva', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EvaluacionNoObjetiva', 'url'=>array('admin')),
);
?>

<h1>Update EvaluacionNoObjetiva <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>