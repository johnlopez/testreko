<?php
    $post = new Post();
    $elements = $post->listarPost();
    $masters = $elements["masters"];
    $childrens = $elements["childrens"];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear lista de comentarios</title>
		<meta name="viewport" content="width-device-width, initial-scale=1">

		
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../../css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/style.css">
	</head>

	<body>
            <form action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/post/create" method="post">
                 
                <div class="comments-container">
                    <h1>Comentarios <a href="http://creaticode.com">creaticode.com</a></h1>

                    <ul id="comments-list" class="comments-list">
                         <?php foreach($masters as $master):?>
                        
                        <li>
                            
                            <div class="comment-main-level">
                                <div class="comment-avatar"><img src="../../css/img.jpg" alt=""></div>
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name by-author">Diego Morales</h6>
                                            <span><?php echo $master['fecha_creacion'];?></span>
                                            <span><?php echo CHtml::link('Agregar comentario', array('post/create'));?></span>
                                            <input type="hidden" name="idPost" value="<?php echo $master['id']?>" />
                                            <span><?php echo $master['id']; ?></span>
                                            <i class="fa fa-reply"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>

                                        <div class="comment-content">
                                            <?php echo $master['mensaje'];?>
                                        </div>

                                    </div>
                            </div>   
                            <?php echo Post::nested($childrens, $master["id"])?>
                        </li>

                        <?php endforeach;?>
                    </ul>
                </div>
            </form>
	</body>
</html>