<?php
/* @var $this RecepciontrabajoController */
/* @var $model RecepcionTrabajo */

$this->breadcrumbs=array(
	'Recepcion Trabajos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RecepcionTrabajo', 'url'=>array('index')),
	array('label'=>'Create RecepcionTrabajo', 'url'=>array('create')),
	array('label'=>'Update RecepcionTrabajo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RecepcionTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RecepcionTrabajo', 'url'=>array('admin')),
);
?>

<h1>View RecepcionTrabajo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_creacion',
		'fecha_modifcacion',
		'fecha_eliminacion',
		'fecha_acceso',
	),
)); ?>
