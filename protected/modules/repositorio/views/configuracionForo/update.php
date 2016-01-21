<?php
/* @var $this ConfiguracionForoController */
/* @var $model ConfiguracionForo */

$this->breadcrumbs=array(
	'Configuracion Foros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfiguracionForo', 'url'=>array('index')),
	array('label'=>'Create ConfiguracionForo', 'url'=>array('create')),
	array('label'=>'View ConfiguracionForo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfiguracionForo', 'url'=>array('admin')),
);
?>

<h1>Update ConfiguracionForo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>