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
            array(
                'label'=>'image',
                'type'=>'raw',
                'value'=>  CHtml::link("Link Doc.", "http://" . $_SERVER["SERVER_NAME"] . Yii::app()->request->baseUrl.'/reko-archivos/utem/repositorio-id-1/'. $tblImage->image
),
            ),
        ),
    )); 
?>

<form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/archivorecurso/download";?>" method="post">
    <input type="hidden" name="image" value='<?php echo $tblImage->image;?>' />

        <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
        <div class="tile-content iconic">
            <span class="icon mif-users"></span>
        </div>
        <span class="tile-label">
            <?php 
                $pizza  = CHtml::encode('DESCARGAR');
                $porciones = explode("_", $pizza);
                foreach ($porciones as $p)
                echo $p." "; // porción
            ?>
        </span>
    </button>
</form> 