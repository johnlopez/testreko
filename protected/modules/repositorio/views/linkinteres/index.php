<?php
/* @var $this LinkinteresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Link Interes',
);

$this->menu=array(
	array('label'=>'Create LinkInteres', 'url'=>array('create')),
	array('label'=>'Manage LinkInteres', 'url'=>array('admin')),
);
?>

<h1>Link Interes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
