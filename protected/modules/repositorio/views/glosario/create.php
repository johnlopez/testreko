<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Glosarios'=>array('index'),
	'Create',
);
?>


<div class="place-right padding20 no-padding-top no-padding-right">
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/index" >
            <button class="button primary" type="submit">
                    Listar Glosario
            </button>
        </form>    
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/admin" >

            <button class="button primary" type="submit">
                    Administrar Glosario
            </button>
        </form>          
</div>
<h1>Repositorio: <?php echo $repositorio->nombre?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<h1>Crear Glosario</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php $this->renderPartial('_form', array(
    'glosario'=>$glosario,
    'repositorio'=>$repositorio,
    )); ?>

