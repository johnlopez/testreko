<div class="place-right padding20 no-padding-top no-padding-right">  
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/linkinteres/create" >
            <button class="button primary" type="submit">
                    Crear Link de interes
            </button>
        </form>          
</div>

<h2>link de interes</h2>


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
                    <th>TITULO</th>
                    <th>NOMBRE</th>
                    <th>URL</th>
                    <th>DESCRIPCION</th>
                    <th>FECHA CREACION</th>
                    <th>FECHA MODIFICACION</th>
                    <th>FECHA ACCESO</th>
                    <th>TIPO DE HERRAMIENTA</th>
                    <th>OPCIONES</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listadoLink as $link):?>                                                     
                    <tr>
                        <td><?php echo $link['id'] ?></td>
                        <td><?php echo $link['titulo'] ?></td>
                        <td><?php echo $link['nombre'] ?></td>
                        <td><?php echo $link['url'] ?></td>
                        <td><?php echo $link['descripcion']?></td>
                        <td><?php echo $link['fecha_creacion']?></td>
                        <td><?php echo $link['fecha_modificacion']?></td>
                        <td><?php echo $link['fecha_acceso']?></td>
                        <td><?php echo $link['tipo_herramienta_id']?></td>
       
                        <td>                                        
                            <?php 
                            // http://www.v09studio.com/websystems/materials/forms.html
                            // pagina html post url form button
                            ?>                                        
                            <div id="button-group-1">
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/linkinteres/view" method="get">
                                    <input type="hidden" name="id" value="<?php echo $link['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-search">

                                        </span>
                                    </button>
                                </form>
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/linkinteres/update" method="get">
                                    <input type="hidden" name="id" value="<?php echo $link['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-pencil">

                                        </span>
                                    </button>
                                </form>
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/linkinteres/borradoFisicoLinkInteres" method="post">
                                    <input type="hidden" name="id" value="<?php echo $link['id']?>" />
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

