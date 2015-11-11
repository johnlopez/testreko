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
                    Listar Glosario
            </button>
        </form>    
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/create" >
            <button class="button primary" type="submit">
                    Crear Glosario
            </button>
        </form> 
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/admin" >
            <button class="button primary" type="submit">
                    Administrar Glosario
            </button>
        </form>
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/view" method="get">
            <input type="hidden" name="id" value="<?php echo $glosario->id?>" />
            <button class="button primary" type="submit">
                    Ver Glosario
            </button>
        </form> 
</div>
<h1>Repositorio: <?php echo $repositorio->nombre; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<div class="place-right padding20 no-padding-top no-padding-right">
       
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosarioterminodefinicion/create" method="post">
            <input type="hidden" name="glosarioId" value="<?php echo $glosario->id?>" />
            <button class="button primary" type="submit">
                    Agregar Termino
            </button>
        </form> 
        
        
</div>
<h1>Editar Glosario <?php echo $glosario->nombre; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php $this->renderPartial('_form', array('glosario'=>$glosario)); ?>


<table class="table striped" id="main_table_demo">
    <thead>
    <tr>
        <th>Id</th>
        <th>Termino</th>
        <th>Definicion</th>            
        <th></th>            

    </tr>
    </thead>
    <tbody>
        <?php foreach($glosarioTerminoDefinicion as $gtd):?>

        <tr>
            <td><?php echo $gtd->id;?></td>
            <td><?php echo $gtd->termino;?></td>
            <td><?php echo $gtd->definicion;?></td>   
            <td>
            <div id="button-group-1">                
                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosarioterminodefinicion/update" method="get">
                    <input type="hidden" name="id" value="<?php echo $gtd->id?>" />
                    <input type="hidden" name="glosarioId" value="<?php echo $glosario->id?>" />
                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                        <span class="icon mif-pencil">

                        </span>
                    </button>
                </form>
                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosarioterminodefinicion/delete" method="post">
                    <input type="hidden" name="id" value="<?php echo $gtd->id?>" />
                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                        <span class="icon mif-cancel">

                        </span>
                    </button>
                </form> 
            </div>         
            </td>
        </tr>  
        <?php endforeach;?>

    </tbody>
</table>