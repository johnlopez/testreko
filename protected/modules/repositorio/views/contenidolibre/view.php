<?php
/* @var $this ContenidolibreController */
/* @var $model ContenidoLibre */

$this->breadcrumbs=array(
	'Contenido Libres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ContenidoLibre', 'url'=>array('index')),
	array('label'=>'Create ContenidoLibre', 'url'=>array('create')),
	array('label'=>'Update ContenidoLibre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContenidoLibre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContenidoLibre', 'url'=>array('admin')),
);
?>

<h1>View ContenidoLibre #<?php echo $model->id; ?></h1>

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
