<h1>Repositorio : <?php echo $repositorio->nombre; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<h1>Archivo Recurso: <?php echo $archivoRecurso->nombre;?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<div class ='form'>
    <?php 
    $form = $this->beginWidget('CActiveForm',
            array(
                'method'=>'post',
                'action'=>Yii::app()->createUrl('repositorio/archivorecurso/agregararchivoarchivorecurso'),
                'htmlOptions'=>array(
                    'enctype'=>'multipart/form-data',
                ),
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            ));
    ?>    
    
    <div class='row'>
        <?php
            $this->widget('CMultiFileUpload',
                    array(
                        'model'=>$model,
                        'name'=>'images',
                        'attribute'=>'images',
                        'accept'=>'jpg|gif|png',
                        'denied'=>'Tipo de archivo no permitido',
                        'max'=>10,
                        'duplicate'=>'Archivo Duplicado',
                    ));
            echo $form->error($model,'images');
        ?>
    </div>
        <?php echo $form->hiddenField($archivoRecurso,'id',array('value'=>$archivoRecurso->id)); ?>
    <div class='row'>
        <?php echo CHtml::submitButton("Subir Imagenes",
                array('class'=>'btn'));?>
    </div>
    <?php $this->endWidget();?>    
</div>