<h2>Administracion Post</h2>

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
                    <th>MENSAJE</th>
                    <th>LEIDO</th>
                    <th>IP</th>
                    <th>HOST</th>
                    <th>FECHA CREACION</th>
                    <th>FECHA MODIFICACION</th>
                    <th>FECHA ACCESO</th>
                    <th>POST_ID</th>
                    <th>FORO_ID</th>
                    <th>OPCIONES</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listadoPost as $post):?>                                                     
                    <tr>
                        <td><?php echo $post['id'] ?></td>
                        <td><?php echo $post['mensaje'] ?></td>
                        <td><?php echo $post['leido'] ?></td>
                        <td><?php echo $post['ip'] ?></td>
                        <td><?php echo $post['host'] ?></td>
                        <td><?php echo $post['fecha_creacion'] ?></td>
                        <td><?php echo $post['fecha_modificacion'] ?></td>
                        <td><?php echo $post['fecha_acceso'] ?></td>
                        <td><?php echo $post['post_id'] ?></td>
                        <td><?php echo $post['foro_id'] ?></td>
       
                        <td>                                        
                            <?php 
                            // http://www.v09studio.com/websystems/materials/forms.html
                            // pagina html post url form button
                            ?>                                        
                            <div id="button-group-1">
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/post/view" method="get">
                                    <input type="hidden" name="id" value="<?php echo $post['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-search">

                                        </span>
                                    </button>
                                </form>
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/post/update" method="get">
                                    <input type="hidden" name="id" value="<?php echo $post['id']?>" />
                                    <button class="toolbar-button bg-white bg-active-grayLighter fg-black" type="submit">
                                        <span class="icon mif-pencil">

                                        </span>
                                    </button>
                                </form>
                                <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/post/borradoFisicoPost" method="post">
                                    <input type="hidden" name="idPost" value="<?php echo $post['id']?>" />
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

