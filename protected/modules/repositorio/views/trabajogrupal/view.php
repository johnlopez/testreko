<?php
/* @var $this TrabajogrupalController */
/* @var $model TrabajoGrupal */

$this->breadcrumbs=array(
	'Trabajo Grupals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrabajoGrupal', 'url'=>array('index')),
	array('label'=>'Create TrabajoGrupal', 'url'=>array('create')),
	array('label'=>'Update TrabajoGrupal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrabajoGrupal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrabajoGrupal', 'url'=>array('admin')),
);
?>

<h1>View TrabajoGrupal #<?php echo $model->id; ?></h1>

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
