<?php
Class SubidaArchivoForm extends CFormModel
{
    public $images;
    
    public function rules(){
        return array
        (
            
            array(
                'images',
                'file',
                'types'=>'jpg,gif,png',
                'wrongType'=>'Formatos permitidos jpg,gif,png',
                'tooLarge'=>'El tamaño maximo de la imagen es 1 MB',
                'allowEmpty'=>TRUE
            ),
        );
    }
}