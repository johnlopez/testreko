<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Repositorio</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>


<div class="main-content clear-float">
    <div class="tile-area no-padding">
        <div class="tile-group no-margin no-padding" style="width: 100%">
            
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/diseno/index";?>" >
                <div class="tile-wide bg-darkBrown fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-flow-tree"></span>
                    </div>
                    <span class="tile-label">            
                        <?php 
                            $pizza  = CHtml::encode('Diseño');
                            $porciones = explode("_", $pizza);
                            foreach ($porciones as $p)
                            echo $p." "; // porción
                        ?>                
                    </span>
                </div>  
            </a>
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/";?>" >
                    <div class="tile-wide bg-brown fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-tools"></span>
                        </div>
                        <span class="tile-label">            
                            <?php 
                                $pizza  = CHtml::encode('Producción');
                                $porciones = explode("_", $pizza);
                                foreach ($porciones as $p)
                                echo $p." "; // porción
                            ?>                
                        </span>
                    </div>  
            </a>
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/";?>" >
                <div class="tile-wide bg-olive fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-checkmark"></span>
                    </div>
                    <span class="tile-label">            
                        <?php 
                            $pizza  = CHtml::encode('Revision');
                            $porciones = explode("_", $pizza);
                            foreach ($porciones as $p)
                            echo $p." "; // porción
                        ?>                
                    </span>
                </div>  
            </a>
            
    </div>
</div> <!-- End of tiles -->