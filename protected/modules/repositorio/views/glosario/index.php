<?php
/* @var $this GlosarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Glosarios',
);


?>
<div class="place-right padding20 no-padding-top no-padding-right">
        <form class="place-left padding20 no-padding-left no-padding-bottom no-padding-top" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/admin" >
            <button class="button primary" type="submit">
                    Administrar Glosarios
            </button>
        </form>    
        <form class="place-left" action="<?php echo Yii::app()->getBaseUrl(); ?>/repositorio/glosario/create" >
            <button class="button primary" type="submit">
                    Crear Glosario
            </button>
        </form>          
</div>
<h1>Repositorio: <?php echo $repositorio->nombre; ?></h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<h1>Lista Glosarios</h1>
<div class="progress small" data-value="100" data-color="bg-grayLight" data-role="progressBar"><div class="bar bg-red" style="width: 85%;"></div></div>

<?php
foreach ($glosarios as $glosario)
{
echo $glosario['id']."::";
echo $glosario['nombre']."<br>";
echo $glosario['descripcion']."<br>";

echo "<br>";
}
?>