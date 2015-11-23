<?php
/* @var $this GlosarioController */
/* @var $model Glosario */

$this->breadcrumbs=array(
	'Glosarios'=>array('index'),
	$model->id,
);

?>

<div class="place-right padding20 no-padding-top no-padding-right">
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/index" >
            <button class="button primary" type="submit">
                    Listar Glosarios
            </button>
        </form>    
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/create" >
            <button class="button primary" type="submit">
                    Crear Glosario
            </button>
        </form> 
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/admin" >
            <button class="button primary" type="submit">
                    Administrar Glosarios
            </button>
        </form>
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/update" method="get">
            <input type="hidden" name="id" value="<?php echo $model->id?>" />
            <button class="button primary" type="submit">
                    Editar Glosario
            </button>
        </form> 
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/delete" method="post">
            <input type="hidden" name="id" value="<?php echo $model->id?>" />
            <button class="button danger" type="submit">
                    Eliminar Glosario
            </button>
        </form> 
</div>

<h1>Repositorio: <?php echo $repositorio->nombre?> </h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<h1>Glosario </h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_creacion',
		'fecha_modificacion',
		'fecha_eliminacion',
		'fecha_acceso',
	),
)); ?>

<h1>Terminos </h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<table class="table striped" id="main_table_demo">
    <thead>
    <tr>
        <th>Id</th>
        <th>Termino</th>
        <th>Definicion</th>            
    </tr>
    </thead>
    <tbody>
        <?php foreach($glosarioTerminoDefinicion as $gtd):?>

        <tr>
            <td><?php echo $gtd->id;?></td>
            <td><?php echo $gtd->termino;?></td>
            <td><?php echo $gtd->definicion;?></td>      
        </tr>  
        <?php endforeach;?>

    </tbody>
</table>

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
                    <form class="" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/glosario/descargararchivoglosario";?>" method="post">
                        <input type="hidden" name="archivoId" value='<?php echo $archivo['id'];?>' />
                        <button class="button" type="submit">Descargar</button>
                    </form> 
                </td>   
            </tr>  
        <?php endforeach; ?>
    </tbody>
</table>

