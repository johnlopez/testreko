<?php
/* @var $this TrabajogrupalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trabajo Grupals',
);

$this->menu=array(
	array('label'=>'Create TrabajoGrupal', 'url'=>array('create')),
	array('label'=>'Manage TrabajoGrupal', 'url'=>array('admin')),
);
?>

<h1>Trabajo Grupals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
