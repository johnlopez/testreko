<div class="place-right padding20 no-padding-top no-padding-right">  
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/foro/create" >
            <button class="button primary" type="submit">
                    Crear Foro
            </button>
        </form>          
</div>

<h2>Administracion foros</h2>

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
                    <th>TEMA</th>
                    <th>DESCRIPCION</th>
                    <th>CONCLUSION</th>
                    <th>LEIDO</th>
                    <th>FECHA CREACION</th>
                    <th>FECHA MODIFICACION</th>
                    <th>FECHA ACCESO</th>
                    <th>TIPO DE HERRAMIENTA</th>
                    <th>OPCIONES</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listadoForos as $foro):?>                                                     
                    <tr>
                        <td><?php echo $foro['id'] ?></td>
                        <td><?php echo $foro['tema'] ?></td>
                        <td><?php echo $foro['descripcion'] ?></td>
                        <td><?php echo $foro['conclusion'] ?></td>
                        <td><?php echo $foro['leido'] ?></td>
                        <td><?php echo $foro['fecha_creacion'] ?></td>
                        <td><?php echo $foro['fecha_modificacion'] ?></td>
                        <td><?php echo $foro['fecha_acceso'] ?></td>
                        <td><?php echo $foro['tipo_herramienta_id'] ?></td>
       
                        <td>                                        
                            <?php 
                            // http://www.v09studio.com/websystems/materials/forms.html
                            // pagina html post url form button
                            ?>                                        
                            <div id="button-group-1">
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/foro/view" method="get">
                                    <input type="hidden" name="id" value="<?php echo $foro['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-search">

                                        </span>
                                    </button>
                                </form>
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/foro/update" method="get">
                                    <input type="hidden" name="id" value="<?php echo $foro['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-pencil">

                                        </span>
                                    </button>
                                </form>
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/foro/borradoFisicoForo" method="post">
                                    <input type="hidden" name="id" value="<?php echo $foro['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                    <span class="icon mif-cancel">

                                        </span>
                                    </button>
                                </form>
                                
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/post/admin" method="post">
                                    <input type="hidden" name="id" value="<?php echo $foro['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-search">

                                        </span>
                                    </button>
                                </form> 
                                
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/configuracionForo/admin" method="post">
                                    <input type="hidden" name="idForo" value="<?php echo $foro['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-search">

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
