<div class="place-right padding20 no-padding-top no-padding-right">  
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/foro/admin" >
            <button class="button primary" type="submit">
                    Administrar foros
            </button>
        </form>          
</div>


<h2>Agregar Foro</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>