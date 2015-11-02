
<h1>Usted registra mas de una Institucion</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<h1>Seleccione una Institucion:</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php 
foreach($listaInstituciones as $institucion):?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/site/seleccioninstitucion";?>" method="post">
        <input type="hidden" name="institucion[]" value='<?php echo serialize($institucion);?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-library"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode($institucion['nombre']);
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form> 
<?php endforeach;?>
