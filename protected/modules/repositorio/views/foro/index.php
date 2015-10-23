<?php
/* @var $this ForoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Foros',
);

$this->menu=array(
	array('label'=>'Create Foro', 'url'=>array('create')),
	array('label'=>'Manage Foro', 'url'=>array('admin')),
);
?>

<h1>Foros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
