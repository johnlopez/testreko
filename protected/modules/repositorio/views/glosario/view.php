<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Glosarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Glosario', 'url'=>array('index')),
	array('label'=>'Create Glosario', 'url'=>array('create')),
	array('label'=>'Update Glosario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Glosario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Glosario', 'url'=>array('admin')),
);
?>

<h1>View Glosario #<?php echo $model->id; ?></h1>

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
