<?php
/* @var $this RecepciontrabajoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recepcion Trabajos',
);

$this->menu=array(
	array('label'=>'Create RecepcionTrabajo', 'url'=>array('create')),
	array('label'=>'Manage RecepcionTrabajo', 'url'=>array('admin')),
);
?>

<h1>Recepcion Trabajos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
