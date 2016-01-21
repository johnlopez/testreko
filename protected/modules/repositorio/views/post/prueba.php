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
								<span>Hace 20 minutos</span>
								<i class="fa fa-reply"></i>
								<i class="fa fa-heart"></i>
							</div>
							<div class="comment-content">
								Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
							</div>
						</div>
                                                
					</div>
                                    
                                </li>
                               <?php endforeach;?> 
			</ul>
                        
		</div>
            
	</body>
</html>

