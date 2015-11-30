<?php
/* @var $this ArchivorecursoController */
/* @var $model ArchivoRecurso */

//$this->breadcrumbs=array(
//	'Archivo Recursos'=>array('index'),
//	$archivoRecurso->id=>array('view','id'=>$archivoRecurso->id),
//	'Update',
//);

//$this->menu=array(
//	array('label'=>'List ArchivoRecurso', 'url'=>array('index')),
//	array('label'=>'Create ArchivoRecurso', 'url'=>array('create')),
//	array('label'=>'View ArchivoRecurso', 'url'=>array('view', 'id'=>$archivoRecurso->id)),
//	array('label'=>'Manage ArchivoRecurso', 'url'=>array('admin')),
//);
?>

<div class="place-right padding20 no-padding-top no-padding-right">
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/index" >
            <button class="button primary" type="submit">
                    Listar Archivo Recurso
            </button>
        </form>    
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/create" >
            <button class="button primary" type="submit">
                    Crear Archivo Recurso
            </button>
        </form> 
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/admin" >
            <button class="button primary" type="submit">
                    Administrar Archivo Recurso
            </button>
        </form>
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/view" method="get">
            <input type="hidden" name="id" value="<?php echo $archivoRecurso->id?>" />
            <button class="button primary" type="submit">
                    Ver Archivo Recurso
            </button>
        </form> 
</div>
<h1>Repositorio : <?php echo $repositorio->nombre; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<div class="place-right padding20 no-padding-top no-padding-right">
       
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/agregararchivoarchivorecurso" method="post">
            <input type="hidden" name="archivoRecursoId" value="<?php echo $archivoRecurso->id?>" />
            <button class="button primary" type="submit">
                    Agregar Archivo
            </button>
        </form>        
</div>
<h1>Editar Archivo Recurso : <?php echo $archivoRecurso->nombre; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php $this->renderPartial('_form', array('archivoRecurso'=>$archivoRecurso)); ?>


<h1>Archivos </h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<?php // echo CHtml::image(Yii::app()->baseUrl.$archivo['ruta'].$archivo['nombre'], '', array('style' => 'width:300px; height: 200px'));?>
<table class="table striped" id="main_table_demo">
    <thead>
    <tr>
        <th>Id</th>
        <th>Archivo</th>
        <th>Tanaño</th>
        <th>Tipo</th>            
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($archivos as $archivo):?>
            <tr>
                <td><?php echo $archivo['id'] ;?></td>
                <td><?php echo $archivo['nombre'] ;?></td>
                <td><?php echo $archivo['tamano']." Bytes" ;?></td>
                <td><?php echo $archivo['mime_type'] ;?></td>
                <td>
                    <form class="" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/archivorecurso/descargararchivoarchivorecurso";?>" method="post">
                        <input type="hidden" name="archivoId" value='<?php echo $archivo['id'];?>' />
                        <button class="button" type="submit">Descargar</button>
                    </form> 
                    
                    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/eliminararchivoarchivorecurso" method="post">
                        <input type="hidden" name="archivoId" value="<?php echo $archivo['id'];?>" />
                        <input type="hidden" name="archivoRecursoId" value="<?php echo $archivoRecurso->id;?>" />

                        <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                            <span class="icon mif-cancel">

                            </span>
                        </button>
                    </form> 
                </td>   
            </tr>  
        <?php endforeach; ?>
    </tbody>
</table>
