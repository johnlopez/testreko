<?php
/* @var $this GlosarioterminodefinicionController */
/* @var $model GlosarioTerminoDefinicion */

$this->breadcrumbs=array(
	'Glosario Termino Definicions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GlosarioTerminoDefinicion', 'url'=>array('index')),
	array('label'=>'Create GlosarioTerminoDefinicion', 'url'=>array('create')),
	array('label'=>'View GlosarioTerminoDefinicion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GlosarioTerminoDefinicion', 'url'=>array('admin')),
);
?>

<h1>Repositorio: <?php echo $repositorio->nombre?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<h1>Glosario: <?php echo $glosario->nombre?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<h1>Editar Termino</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'glosario'=>$glosario,
)); ?>