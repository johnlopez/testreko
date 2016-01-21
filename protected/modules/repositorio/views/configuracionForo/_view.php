<?php
/* @var $this ConfiguracionForoController */
/* @var $data ConfiguracionForo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_post')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foro_id')); ?>:</b>
	<?php echo CHtml::encode($data->foro_id); ?>
	<br />


</div>