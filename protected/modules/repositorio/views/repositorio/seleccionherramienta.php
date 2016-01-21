<h1>Repositorio: <?php echo Yii::app()->session['repositorio']->nombre?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<h1>Seleccione Herramienta</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php 
foreach($herramientasDisponibles as $herramienta):?>
    <?php if(1 == $herramienta['trabajo_grupal']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="herramientaBool" value='<?php echo $herramienta['trabajo_grupal'];?>' />

            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-users"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('trabajo_grupal');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form> 
    <?php endif;?>

    <?php if(1 == $herramienta['archivo_recurso']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/archivorecurso/admin";?>" method="post">
        <input type="hidden" name="herramientaBool" value='<?php echo $herramienta['archivo_recurso'];?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-file-text"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('archivo_recurso');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>  
    <?php endif;?>

    <?php if(1 == $herramienta['link_interes']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/linkinteres/admin";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-link"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('link_interes');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>   
    <?php endif;?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <?php if(1 == $herramienta['glosario']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/glosario/admin";?>" method="post">
        <input type="hidden" name="herramientaBool" value='<?php echo $herramienta['glosario'];?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-spell-check"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('glosario');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>   
    <?php endif;?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <?php if(1 == $herramienta['contenido_libre']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-shareable"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('contenido_libre');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>  
    <?php endif;?>
    <?php if(1 == $herramienta['foro']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/repositorio/foro/admin";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-insert-template"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('foro');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>  
    <?php endif;?>
    <?php if(1 == $herramienta['evaluacion']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-clipboard"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('evaluacion');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>
    <?php endif;?>
    <?php if($herramienta['autoevaluacion']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-clipboard"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('autoevaluacion');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>
    <?php endif;?>
    <?php if(1 == $herramienta['proyecto']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-lab"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('proyecto');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>
    <?php endif;?>
    <?php if(1==$herramienta['recepcion_trabajo']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-enter"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('recepcion_trabajo');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>
    <?php endif;?>
    <?php if(1 == $herramienta['evaluacion_no_objetiva']):;?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($herramienta);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-clipboard"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode('evaluacion_no_objetiva');
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>
    <?php endif;?>
<?php endforeach; ?>