<?php
/* @var $this GlosarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Glosarios',
);

$this->menu=array(
	array('label'=>'Create Glosario', 'url'=>array('create')),
	array('label'=>'Manage Glosario', 'url'=>array('admin')),
);
?>

<h1>Glosarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
