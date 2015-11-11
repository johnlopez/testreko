<?php
/* @var $this GlosarioterminodefinicionController */
/* @var $model GlosarioTerminoDefinicion */

$this->breadcrumbs=array(
	'Glosario Termino Definicions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GlosarioTerminoDefinicion', 'url'=>array('index')),
	array('label'=>'Create GlosarioTerminoDefinicion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#glosario-termino-definicion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Glosario Termino Definicions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'glosario-termino-definicion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'termino',
		'definicion',
		'fecha_creacion',
		'fecha_modificacion',
		'fecha_acceso',
		/*
		'fecha_eliminacion',
		'glosario_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
