<h1>Modulo: <?php echo $modulo->nombre?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<h1>Repositorios Disponibles</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php foreach ($repositorios as $repositorio): ?>
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/modulo/seleccionherramienta";?>" method="post">
        <input type="hidden" name="repositorioId" value='<?php echo $repositorio['id'];?>' />
        <input type="hidden" name="moduloId" value='<?php echo $modulo->id;?>' />

            <button class="tile-wide bg-brown fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-cabinet"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode($repositorio['nombre']);
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>   
<?php endforeach;?>

