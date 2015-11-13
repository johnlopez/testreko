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
                'value'=>  CHtml::image(Yii::app()->baseUrl.'/reko-archivos/utem/repositorio-id-1/'.$tblImage->image),
            ),
            array(
                'label'=>'image',
                'type'=>'raw',
                'value'=>  CHtml::link(Yii::app()->baseUrl.'/reko-archivos/utem/repositorio-id-1/'.$tblImage->image),
            ),
        ),
    )); 
?>