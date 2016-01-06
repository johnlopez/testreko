<h1>Modulo: <?php echo $modulo->nombre?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>
<h1>Repositorio: <?php echo Yii::app()->session['repositorioaula']->nombre;?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php foreach($glosarios as $glosario):?> 
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/glosario/view";?>" method="post">
        <input type="hidden" name="moduloId" value='<?php echo $modulo->id;?>' />
        <input type="hidden" name="glosarioId" value='<?php echo $glosario['id'];?>' />

            <button class="tile-wide bg-brown fg-white" data-role="tile" type="submit">
            <div class="tile-content iconic">
                <span class="icon mif-cabinet"></span>
            </div>
            <span class="tile-label">
                <?php 
                    $pizza  = CHtml::encode($glosario['nombre']);
                    $porciones = explode("_", $pizza);
                    foreach ($porciones as $p)
                    echo $p." "; // porción
                ?>
            </span>
        </button>
    </form>   
<?php endforeach;?>