<?php
/* @var $this EscritorioUsuarioController */
/* @var $model EscritorioUsuario */

$this->breadcrumbs=array(
	'Escritorio Usuarios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EscritorioUsuario', 'url'=>array('index')),
	array('label'=>'Create EscritorioUsuario', 'url'=>array('create')),
	array('label'=>'Update EscritorioUsuario', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Delete EscritorioUsuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EscritorioUsuario', 'url'=>array('admin')),
);
?>

<h1>View EscritorioUsuario #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'type',
		'description',
		'bizrule',
		'data',
	),
)); ?>
