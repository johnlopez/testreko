<?php
/* @var $this ConfiguracionForoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Configuracion Foros',
);

$this->menu=array(
	array('label'=>'Create ConfiguracionForo', 'url'=>array('create')),
	array('label'=>'Manage ConfiguracionForo', 'url'=>array('admin')),
);
?>

<h1>Configuracion Foros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
