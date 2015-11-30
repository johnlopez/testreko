<?php
/* @var $this ArchivorecursoController */
/* @var $model ArchivoRecurso */

$this->breadcrumbs=array(
	'Archivo Recursos'=>array('index'),
	$model->id,
);

//$this->menu=array(
//	array('label'=>'List ArchivoRecurso', 'url'=>array('index')),
//	array('label'=>'Create ArchivoRecurso', 'url'=>array('create')),
//	array('label'=>'Update ArchivoRecurso', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete ArchivoRecurso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
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
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/update" method="get">
            <input type="hidden" name="id" value="<?php echo $model->id?>" />
            <button class="button primary" type="submit">
                    Editar Archivo Recurso
            </button>
        </form> 
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/archivorecurso/delete" method="post">
            <input type="hidden" name="id" value="<?php echo $model->id?>" />
            <button class="button danger" type="submit">
                    Eliminar Archivo Recurso
            </button>
        </form> 
</div>

<h1>Repositorio: <?php echo $repositorio->nombre?> </h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<h1>Archivo Recurso </h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_creacion',
		'fecha_modificacion',
		'fecha_elminacion',
		'fecha_acceso',
	),
)); ?>


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
                </td>   
            </tr>  
        <?php endforeach; ?>
    </tbody>
</table>


