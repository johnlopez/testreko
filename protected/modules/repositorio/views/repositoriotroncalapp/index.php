<?php
/* @var $this RepositorioTroncalAppController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Repositorio Troncal Apps',
);

$this->menu=array(
	array('label'=>'Create RepositorioTroncalApp', 'url'=>array('create')),
	array('label'=>'Manage RepositorioTroncalApp', 'url'=>array('admin')),
);
?>

<h1>Repositorio Troncal Apps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
