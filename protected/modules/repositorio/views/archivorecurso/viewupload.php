<?php 
    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$tblImage,
        'attributes'=>array(
            'id_image',
            'id_user',
            'title',
            'folder',
//            'image',
            array(
                'label'=>'image',
                'type'=>'raw',
                'value'=>  CHtml::image(Yii::app()->baseUrl.'/reko-archivos/utem/repositorio-id-1/'.$tblImage->image, '', array('style' => 'width:300px; height: 200px')),
//                'value'=>  CHtml::image(Yii::app()->baseUrl.'/reko-archivos/utem/repositorio-id-1/'.$tblImage->image),
            ),
        ),
    )); 
?>

<form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/archivorecurso/download";?>" method="post">
    <input type="hidden" name="image" value='<?php echo $tblImage->image;?>' />
        <button class="button" type="submit">Descargar</button>
</form> 

