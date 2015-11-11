<?php
/* @var $this GlosarioterminodefinicionController */
/* @var $data GlosarioTerminoDefinicion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('termino')); ?>:</b>
	<?php echo CHtml::encode($data->termino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('definicion')); ?>:</b>
	<?php echo CHtml::encode($data->definicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_acceso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_acceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_eliminacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_eliminacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('glosario_id')); ?>:</b>
	<?php echo CHtml::encode($data->glosario_id); ?>
	<br />

	*/ ?>

</div>