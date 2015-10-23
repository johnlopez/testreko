<?php
/* @var $this LinkinteresController */
/* @var $model LinkInteres */

$this->breadcrumbs=array(
	'Link Interes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LinkInteres', 'url'=>array('index')),
	array('label'=>'Create LinkInteres', 'url'=>array('create')),
	array('label'=>'Update LinkInteres', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LinkInteres', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LinkInteres', 'url'=>array('admin')),
);
?>

<h1>View LinkInteres #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_creacion',
		'fecha_modificacion',
		'fecha_elminacion',
		'fecha_acceso',
	),
)); ?>
