<h3>Listado de Roles</h3> <br><br>
<?php
    foreach ($listaDeRoles as $roles): 
?>
  
    <form class="place-left" action="<?php echo Yii::app()->getBaseUrl()."/aula/aula/listadoProgramas";?>" method="post">
        <input type="hidden" name="idRol" value='<?php echo $roles['id'];?>' />
            <button class="tile-wide bg-darkGreen fg-white" data-role="tile" type="submit">
                <div class="tile-content iconic">
                    <span class="icon mif-spell-check"></span>
                </div>

                <span class="tile-label">
                    <?php 
                        $pizza  = CHtml::encode($roles['nombre']);
                        $porciones = explode("_", $pizza);
                        foreach ($porciones as $p)
                        echo $p." "; // porción
                    ?>

                </span>
            </button>
    </form>   

<<<<<<< HEAD
<?php endforeach;?>
=======
<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>

hola
<?php 
echo Yii::app()->user->id ;
?>
>>>>>>> 91d835683f603eb67e8173ab3fd7ad2b60434f24
