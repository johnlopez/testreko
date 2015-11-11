<?php
/* @var $this GlosarioterminodefinicionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Glosario Termino Definicions',
);

$this->menu=array(
	array('label'=>'Create GlosarioTerminoDefinicion', 'url'=>array('create')),
	array('label'=>'Manage GlosarioTerminoDefinicion', 'url'=>array('admin')),
);
?>

<h1>Glosario Termino Definicions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
