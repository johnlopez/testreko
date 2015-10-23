<?php
/* @var $this RecepciontrabajoController */
/* @var $model RecepcionTrabajo */

$this->breadcrumbs=array(
	'Recepcion Trabajos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RecepcionTrabajo', 'url'=>array('index')),
	array('label'=>'Create RecepcionTrabajo', 'url'=>array('create')),
	array('label'=>'View RecepcionTrabajo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RecepcionTrabajo', 'url'=>array('admin')),
);
?>

<h1>Update RecepcionTrabajo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>