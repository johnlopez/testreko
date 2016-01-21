<h3>Contrato</h3> <br><br>
<?php
    foreach ($listarContrato as $contrato): 
?>
  
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/aula/aceptarContrato";?>" method="post">
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
                <div class="tile-content iconic">
                    <span class="icon mif-spell-check"></span>
                </div>

                <span class="tile-label">
                    <?php 
                        $pizza  = CHtml::encode($contrato['nombre']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                        echo "<br>";
                        $pizza  = CHtml::encode($contrato['descripcion']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p.""; // porción
                    ?>

                </span>
            </button>
    </form>   

<?php endforeach;?>
