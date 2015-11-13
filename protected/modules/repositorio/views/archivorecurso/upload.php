<div class ='form'>
    <?php 
    $form = $this->beginWidget('CActiveForm',
            array(
                'method'=>'post',
                'action'=>Yii::app()->createUrl('repositorio/archivorecurso/upload'),
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
            echo $form->labelEx($model,'title');
            echo $form->textField($model,'title');
            echo $form->error($model,'title',array('class'=>'text-error'));
        ?>
    </div>
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
    <div class='row'>
        <?php echo CHtml::submitButton("Subir Imagenes",
                array('class'=>'btn'));?>
    </div>
    <?php $this->endWidget();?>    
</div>