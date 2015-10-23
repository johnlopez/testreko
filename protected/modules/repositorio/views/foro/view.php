<?php
/* @var $this ForoController */
/* @var $model Foro */

$this->breadcrumbs=array(
	'Foros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Foro', 'url'=>array('index')),
	array('label'=>'Create Foro', 'url'=>array('create')),
	array('label'=>'Update Foro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Foro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Foro', 'url'=>array('admin')),
);
?>

<h1>View Foro #<?php echo $model->id; ?></h1>

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
