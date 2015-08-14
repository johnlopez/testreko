<?php
/* @var $this RepositorioTroncalAppController */
/* @var $model RepositorioTroncalApp */

$this->breadcrumbs=array(
	'Repositorio Troncal Apps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RepositorioTroncalApp', 'url'=>array('index')),
	array('label'=>'Create RepositorioTroncalApp', 'url'=>array('create')),
	array('label'=>'Update RepositorioTroncalApp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RepositorioTroncalApp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RepositorioTroncalApp', 'url'=>array('admin')),
);
?>

<h1>View RepositorioTroncalApp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_acceso',
		'fecha_modificacion',
		'fecha_creacion',
		'modelo_aprendizaje_id',
	),
)); ?>
