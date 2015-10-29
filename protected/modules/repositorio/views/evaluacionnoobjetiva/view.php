<?php
/* @var $this EvaluacionnoobjetivaController */
/* @var $model EvaluacionNoObjetiva */

$this->breadcrumbs=array(
	'Evaluacion No Objetivas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EvaluacionNoObjetiva', 'url'=>array('index')),
	array('label'=>'Create EvaluacionNoObjetiva', 'url'=>array('create')),
	array('label'=>'Update EvaluacionNoObjetiva', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EvaluacionNoObjetiva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EvaluacionNoObjetiva', 'url'=>array('admin')),
);
?>

<h1>View EvaluacionNoObjetiva #<?php echo $model->id; ?></h1>

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
