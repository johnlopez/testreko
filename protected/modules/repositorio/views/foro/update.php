<?php
/* @var $this ForoController */
/* @var $model Foro */

$this->breadcrumbs=array(
	'Foros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Foro', 'url'=>array('index')),
	array('label'=>'Create Foro', 'url'=>array('create')),
	array('label'=>'View Foro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Foro', 'url'=>array('admin')),
);
?>

<h1>Update Foro <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>