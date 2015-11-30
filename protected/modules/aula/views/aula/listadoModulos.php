<h3>Listado de modulos</h3> <br><br>
<?php
    foreach ($listadoDeModulos as $modulos): 
?>
  
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/aula/listadoSecciones";?>" method="post">
        <input type="hidden" name="idModulo" value='<?php echo $modulos['id'];?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
                <div class="tile-content iconic">
                    <span class="icon mif-spell-check"></span>
                </div>

                <span class="tile-label">
                    <?php 
                        $pizza  = CHtml::encode($modulos['nombre']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                        echo "<br>";
                        $pizza  = CHtml::encode($modulos['descripcion']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                    ?>

                </span>
            </button>
    </form>   

<?php endforeach;?>
