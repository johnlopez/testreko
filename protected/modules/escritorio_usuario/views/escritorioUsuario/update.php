<?php
/* @var $this EscritorioUsuarioController */
/* @var $model EscritorioUsuario */

$this->breadcrumbs=array(
	'Escritorio Usuarios'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List EscritorioUsuario', 'url'=>array('index')),
	array('label'=>'Create EscritorioUsuario', 'url'=>array('create')),
	array('label'=>'View EscritorioUsuario', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage EscritorioUsuario', 'url'=>array('admin')),
);
?>

<h1>Update EscritorioUsuario <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>