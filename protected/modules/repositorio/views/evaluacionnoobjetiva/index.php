<?php
/* @var $this EvaluacionnoobjetivaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacion No Objetivas',
);

$this->menu=array(
	array('label'=>'Create EvaluacionNoObjetiva', 'url'=>array('create')),
	array('label'=>'Manage EvaluacionNoObjetiva', 'url'=>array('admin')),
);
?>

<h1>Evaluacion No Objetivas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
