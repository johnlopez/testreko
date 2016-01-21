<h3>Listado de programas</h3> <br><br>
<?php
    foreach ($listadoDeProgramas as $programas): 
?>
  
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/aula/listadoModulos";?>" method="post">
       <input type="hidden" name="idPrograma" value='<?php echo $programas['id'];?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
                <div class="tile-content iconic">
                    <span class="icon mif-spell-check"></span>
                </div>

                <span class="tile-label">
                    <?php 
                        $pizza  = CHtml::encode($programas['nombre']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                        echo "<br>";
                        $pizza  = CHtml::encode($programas['descripcion']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                    ?>

                </span>
            </button>
    </form>   

<?php endforeach;?>
<br><br><br><br><br><br>

<br><br><br><br><br><br><h3>Listado de modulos que no pertenecen a un programa</h3> <br><br>
<?php
    foreach ($listadoModulosNoAsignados as $modulo): 
?>
  
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/aula/listadoSecciones";?>" method="post">
       <input type="hidden" name="idModulo" value='<?php echo $modulo['id'];?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
                <div class="tile-content iconic">
                    <span class="icon mif-spell-check"></span>
                </div>

                <span class="tile-label">
                    <?php 
                        $pizza  = CHtml::encode($modulo['nombre']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                        echo "<br>";
                        $pizza  = CHtml::encode($modulo['descripcion']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                    ?>

                </span>
            </button>
    </form>   

<?php endforeach;?>

