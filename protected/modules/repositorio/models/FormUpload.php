<?php
Class FormUpload extends CFormModel
{
    public $title;
    public $images;
    
    public function rules(){
        return array
        (
            array(
                'title',
                'required',
                'message'=>'Campo Requerido',
            ),
            array(
                'title',
                'match',
                'pattern'=>'/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
                'message'=>'Error, solo letras y numeros',
            ),
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
