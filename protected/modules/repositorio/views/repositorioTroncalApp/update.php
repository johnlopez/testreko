<?php
/* @var $this RepositorioTroncalAppController */
/* @var $model RepositorioTroncalApp */

$this->breadcrumbs=array(
	'Repositorio Troncal Apps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RepositorioTroncalApp', 'url'=>array('index')),
	array('label'=>'Create RepositorioTroncalApp', 'url'=>array('create')),
	array('label'=>'View RepositorioTroncalApp', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RepositorioTroncalApp', 'url'=>array('admin')),
);
?>

<h1>Update RepositorioTroncalApp <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>