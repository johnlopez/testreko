<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Glosarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Glosario', 'url'=>array('index')),
	array('label'=>'Create Glosario', 'url'=>array('create')),
	array('label'=>'View Glosario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Glosario', 'url'=>array('admin')),
);
?>

<h1>Update Glosario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>