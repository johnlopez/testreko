<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<div class="main-content clear-float">
    <div class="tile-area no-padding">
        <div class="tile-group no-margin no-padding" style="width: 100%">
            <h3 class="fg-blue text-light margin5">SPORT <span class="mif-chevron-right mif-2x" style="vertical-align: top !important;"></span></h3>
            
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/diseno/index";?>" >
                <div class="tile-large bg-steel fg-white" data-role="tile">
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
                    <div class="tile-large bg-teal fg-white" data-role="tile">
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
                <div class="tile-large bg-green fg-white" data-role="tile">
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