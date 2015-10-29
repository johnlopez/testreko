<?php
/* @var $this AutoevaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Autoevaluacions',
);

$this->menu=array(
	array('label'=>'Create Autoevaluacion', 'url'=>array('create')),
	array('label'=>'Manage Autoevaluacion', 'url'=>array('admin')),
);
?>

<h1>Autoevaluacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
