<?php
/* @var $this TrabajogrupalController */
/* @var $model TrabajoGrupal */

$this->breadcrumbs=array(
	'Trabajo Grupals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrabajoGrupal', 'url'=>array('index')),
	array('label'=>'Create TrabajoGrupal', 'url'=>array('create')),
	array('label'=>'View TrabajoGrupal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TrabajoGrupal', 'url'=>array('admin')),
);
?>

<h1>Update TrabajoGrupal <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>