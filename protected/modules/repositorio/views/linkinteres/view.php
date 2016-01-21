<div class="place-right padding20 no-padding-top no-padding-right">  
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/linkinteres/admin" >
            <button class="button primary" type="submit">
                    Administrar Link de interes
            </button>
        </form>          
</div>

<h2>Vista Link de interes #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                'titulo',
		'nombre',
                'url',
		'descripcion',
		'fecha_creacion',
		'fecha_modificacion',
		'fecha_elminacion',
		'fecha_acceso',
                'tipo_herramienta_id'
	),
)); ?>
