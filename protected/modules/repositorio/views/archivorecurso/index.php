<?php
/* @var $this ArchivorecursoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Archivo Recursos',
);

$this->menu=array(
	array('label'=>'Create ArchivoRecurso', 'url'=>array('create')),
	array('label'=>'Manage ArchivoRecurso', 'url'=>array('admin')),
);
?>

<h1>Archivo Recursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
