<?php
/* @var $this ContenidolibreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contenido Libres',
);

$this->menu=array(
	array('label'=>'Create ContenidoLibre', 'url'=>array('create')),
	array('label'=>'Manage ContenidoLibre', 'url'=>array('admin')),
);
?>

<h1>Contenido Libres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
