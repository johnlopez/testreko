<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Glosarios'=>array('index'),
	$glosario->id=>array('view','id'=>$glosario->id),
	'Update',
);
//
//$this->menu=array(
//	array('label'=>'List Glosario', 'url'=>array('index')),
//	array('label'=>'Create Glosario', 'url'=>array('create')),
//	array('label'=>'View Glosario', 'url'=>array('view', 'id'=>$glosario->id)),
//	array('label'=>'Manage Glosario', 'url'=>array('admin')),
//);
?>
<div class="place-right padding20 no-padding-top no-padding-right">
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/index" >
            <button class="button primary" type="submit">
                    Listar Usuario
            </button>
        </form>    
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/create" >
            <button class="button primary" type="submit">
                    Crear Usuario
            </button>
        </form> 
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/admin" >
            <button class="button primary" type="submit">
                    Administrar Usuario
            </button>
        </form>
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/view" method="get">
            <input type="hidden" name="id" value="<?php echo $glosario->id?>" />
            <button class="button primary" type="submit">
                    Ver Usuario
            </button>
        </form> 
</div>
<h1>Repositorio: <?php echo $repositorio->nombre; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<h1>Editar Glosario <?php echo $glosario->id; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php $this->renderPartial('_form', array('glosario'=>$glosario)); ?>