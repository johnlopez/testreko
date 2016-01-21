<?php
/* @var $this ConfiguracionForoController */
/* @var $model ConfiguracionForo */

$this->breadcrumbs=array(
	'Configuracion Foros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConfiguracionForo', 'url'=>array('index')),
	array('label'=>'Create ConfiguracionForo', 'url'=>array('create')),
	array('label'=>'Update ConfiguracionForo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfiguracionForo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfiguracionForo', 'url'=>array('admin')),
);
?>

<h1>View ConfiguracionForo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cantidad_post',
		'foro_id',
	),
)); ?>
