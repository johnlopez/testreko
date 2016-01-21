<div class="place-right padding20 no-padding-top no-padding-right">  
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/configuracionForo/create" >
            <button class="button primary" type="submit">
                    Crear Foro
            </button>
        </form>          
</div>



<h2>Administracion configuracion foros</h2>

<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#main_table_demo').DataTable();
} );
</script>
<div class="container">
    <section>
        <table id="main_table_demo" class="display cell-hovered hovered striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CANTIDAD POST</th>
                    <th>FORO ID</th>
                    <th>OPCIONES</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listarConfiguracion as $configuracionForo):?>                                                     
                    <tr>
                        <td><?php echo $configuracionForo['id'] ?></td>
                        <td><?php echo $configuracionForo['cantidad_post'] ?></td>
                        <td><?php echo $configuracionForo['foro_id'] ?></td>
                        
                        <td>                                        
                            <?php 
                            // http://www.v09studio.com/websystems/materials/forms.html
                            // pagina html post url form button
                            ?>                                        
                            <div id="button-group-1">
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/configuracionForo/view" method="get">
                                    <input type="hidden" name="id" value="<?php echo $configuracionForo['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-search">

                                        </span>
                                    </button>
                                </form>
                                
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/configuracionForo/update" method="get">
                                    <input type="hidden" name="id" value="<?php echo $configuracionForo['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-pencil">

                                        </span>
                                    </button>
                                </form>
                                
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/configuracionForo/BorradoFisicoConfiguracionForo" method="post">
                                    <input type="hidden" name="idConfiguracion" value="<?php echo $configuracionForo['id']?>" />
                                    <input type="hidden" name="idForo2" value="<?php echo $idForo?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                         <span class="icon mif-cancel">

                                        </span>
                                    </button>
                                </form>
                            </div>                                        
                        </td>
                    </tr>
                <?php endforeach;?>                                
            </tbody>
        </table>
        <ul class="tabs">
                <li class="active"></li>                        
        </ul>               
    </section>
</div>