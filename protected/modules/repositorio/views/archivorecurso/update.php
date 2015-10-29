<?php
/* @var $this ArchivorecursoController */
/* @var $model ArchivoRecurso */

$this->breadcrumbs=array(
	'Archivo Recursos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArchivoRecurso', 'url'=>array('index')),
	array('label'=>'Create ArchivoRecurso', 'url'=>array('create')),
	array('label'=>'View ArchivoRecurso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArchivoRecurso', 'url'=>array('admin')),
);
?>

<h1>Update ArchivoRecurso <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>