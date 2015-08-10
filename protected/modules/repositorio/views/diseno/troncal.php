<?php
/* @var $this DisenoController */

$this->breadcrumbs=array(
	'Diseno',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<br>
<div class="main-content clear-float">
    <div class="tile-area no-padding">
        <div class="tile-group no-margin no-padding" style="width: 100%">            
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/repositoriotroncaladmin/index";?>" >
                <div class="tile-wide bg-darkEmerald fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-stack3"></span>
                    </div>
                    <span class="tile-label">            
                        <?php 
                            $pizza  = CHtml::encode('Repositorio Troncal Admin');
                            $porciones = explode("_", $pizza);
                            foreach ($porciones as $p)
                            echo $p." "; // porción
                        ?>                
                    </span>
                </div>  
            </a>            
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/repositoriotroncalapp/index";?>" >
                <div class="tile-wide bg-darkEmerald fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-stack3"></span>
                    </div>
                    <span class="tile-label">            
                        <?php 
                            $pizza  = CHtml::encode('Repositorio Troncal App');
                            $porciones = explode("_", $pizza);
                            foreach ($porciones as $p)
                            echo $p." "; // porción
                        ?>                
                    </span>
                </div>  
            </a> 
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/modeloaprendizaje/index";?>" >
                    <div class="tile-wide bg-darkTeal fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-multitrack-audio"></span>
                        </div>
                        <span class="tile-label">            
                            <?php 
                                $pizza  = CHtml::encode('Modelos Aprendizaje');
                                $porciones = explode("_", $pizza);
                                foreach ($porciones as $p)
                                echo $p." "; // porción
                            ?>                
                        </span>
                    </div>  
            </a>  
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/";?>" >
                    <div class="tile-wide bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-school"></span>
                        </div>
                        <span class="tile-label">            
                            <?php 
                                $pizza  = CHtml::encode('Modulos');
                                $porciones = explode("_", $pizza);
                                foreach ($porciones as $p)
                                echo $p." "; // porción
                            ?>                
                        </span>
                    </div>  
            </a>   
            <a href="<?php echo Yii::app()->getBaseUrl()."/repositorio/";?>" >
                    <div class="tile-wide bg-darkGreen fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-tools"></span>
                        </div>
                        <span class="tile-label">            
                            <?php 
                                $pizza  = CHtml::encode('Herramientas');
                                $porciones = explode("_", $pizza);
                                foreach ($porciones as $p)
                                echo $p." "; // porción
                            ?>                
                        </span>
                    </div>  
            </a>   
    </div>
</div> <!-- End of tiles -->