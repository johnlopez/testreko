<?php
/* @var $this DisenoController */

$this->breadcrumbs=array(
	'Diseno',
);
?>
<h1>Diseño</h1>
<br>
<div class="main-content clear-float">
    <div class="tile-area no-padding">
        <div class="tile-group no-margin no-padding" style="width: 100%">           
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/repositorio/adminrepositorio";?>" >
                <div class="tile-wide bg-darkBrown fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-stack3"></span>
                    </div>
                    <span class="tile-label">            
                        <?php 
                            $pizza  = CHtml::encode('Troncal');
                            $porciones = explode("_", $pizza);
                            foreach ($porciones as $p)
                            echo $p." "; // porción
                        ?>                
                    </span>
                </div>  
            </a>
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/";?>" >
                    <div class="tile-wide bg-darkBrown fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-stack2"></span>
                        </div>
                        <span class="tile-label">            
                            <?php 
                                $pizza  = CHtml::encode('Local');
                                $porciones = explode("_", $pizza);
                                foreach ($porciones as $p)
                                echo $p." "; // porción
                            ?>                
                        </span>
                    </div>  
            </a>          
    </div>
</div> <!-- End of tiles -->