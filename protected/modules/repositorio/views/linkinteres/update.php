<div class="place-right padding20 no-padding-top no-padding-right">  
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/linkinteres/admin" >
            <button class="button primary" type="submit">
                    Administrar Link de interes
            </button>
        </form>          
</div>

<h2>Actualizar Link de interes <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>