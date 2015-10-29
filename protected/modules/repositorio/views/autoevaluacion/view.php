<?php
/* @var $this AutoevaluacionController */
/* @var $model Autoevaluacion */

$this->breadcrumbs=array(
	'Autoevaluacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Autoevaluacion', 'url'=>array('index')),
	array('label'=>'Create Autoevaluacion', 'url'=>array('create')),
	array('label'=>'Update Autoevaluacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Autoevaluacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Autoevaluacion', 'url'=>array('admin')),
);
?>

<h1>View Autoevaluacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_creacion',
		'fecha_modificacion',
		'fecha_eliminacion',
		'fecha_acceso',
	),
)); ?>
