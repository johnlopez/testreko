<?php
/* @var $this ModeloAprendizajeController */
/* @var $model ModeloAprendizaje */

$this->breadcrumbs=array(
	'Modelo Aprendizajes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ModeloAprendizaje', 'url'=>array('index')),
	array('label'=>'Manage ModeloAprendizaje', 'url'=>array('admin')),
);
?>

<h1>View ModeloAprendizaje #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_acceso',
		'fecha_modificacion',
		'fecha_creacion',
	),
)); ?>
