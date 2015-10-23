<?php
/* @var $this LinkinteresController */
/* @var $model LinkInteres */

$this->breadcrumbs=array(
	'Link Interes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LinkInteres', 'url'=>array('index')),
	array('label'=>'Create LinkInteres', 'url'=>array('create')),
	array('label'=>'View LinkInteres', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LinkInteres', 'url'=>array('admin')),
);
?>

<h1>Update LinkInteres <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>