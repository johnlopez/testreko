<?php
/* @var $this ContenidolibreController */
/* @var $model ContenidoLibre */

$this->breadcrumbs=array(
	'Contenido Libres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContenidoLibre', 'url'=>array('index')),
	array('label'=>'Create ContenidoLibre', 'url'=>array('create')),
	array('label'=>'View ContenidoLibre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ContenidoLibre', 'url'=>array('admin')),
);
?>

<h1>Update ContenidoLibre <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>