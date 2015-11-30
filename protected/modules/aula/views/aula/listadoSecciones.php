<h3>Listado de secciones</h3> <br><br>
<?php
    foreach ($listadoDeSecciones as $secciones): 
?>
  
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/aula/listadoProgramas";?>" method="post">
<!--        <input type="hidden" name="idRol" value='<//?php echo $roles['id'];?>' />-->
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
                <div class="tile-content iconic">
                    <span class="icon mif-spell-check"></span>
                </div>

                <span class="tile-label">
                    <?php 
                        $pizza  = CHtml::encode($secciones['nombre']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                        echo "<br>";
                        $pizza  = CHtml::encode($secciones['descripcion']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                    ?>

                </span>
            </button>
    </form>   

<?php endforeach;?>


