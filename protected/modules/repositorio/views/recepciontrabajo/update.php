<?php
/* @var $this RecepciontrabajoController */
/* @var $model RecepcionTrabajo */

$this->breadcrumbs=array(
	'Recepcion Trabajos'=>array('index'),
	$recepcionTrabajo->id=>array('view','id'=>$recepcionTrabajo->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RecepcionTrabajo', 'url'=>array('index')),
	array('label'=>'Create RecepcionTrabajo', 'url'=>array('create')),
	array('label'=>'View RecepcionTrabajo', 'url'=>array('view', 'id'=>$recepcionTrabajo->id)),
	array('label'=>'Manage RecepcionTrabajo', 'url'=>array('admin')),
);
?>

<h1>Update RecepcionTrabajo <?php echo $recepcionTrabajo->id; ?></h1>

<?php $this->renderPartial('_form', array('recepcionTrabajo'=>$recepcionTrabajo)); ?>