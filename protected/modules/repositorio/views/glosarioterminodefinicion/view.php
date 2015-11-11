<?php
/* @var $this GlosarioterminodefinicionController */
/* @var $model GlosarioTerminoDefinicion */

$this->breadcrumbs=array(
	'Glosario Termino Definicions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GlosarioTerminoDefinicion', 'url'=>array('index')),
	array('label'=>'Create GlosarioTerminoDefinicion', 'url'=>array('create')),
	array('label'=>'Update GlosarioTerminoDefinicion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GlosarioTerminoDefinicion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GlosarioTerminoDefinicion', 'url'=>array('admin')),
);
?>

<h1>View GlosarioTerminoDefinicion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'termino',
		'definicion',
		'fecha_creacion',
		'fecha_modificacion',
		'fecha_acceso',
		'fecha_eliminacion',
		'glosario_id',
	),
)); ?>
