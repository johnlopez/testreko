<?php
/* @var $this ForoController */
/* @var $data Foro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tema')); ?>:</b>
	<?php echo CHtml::encode($data->tema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conclusion')); ?>:</b>
	<?php echo CHtml::encode($data->conclusion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leido')); ?>:</b>
	<?php echo CHtml::encode($data->leido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_eliminacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_eliminacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_acceso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_acceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_herramienta_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_herramienta_id); ?>
	<br />

	*/ ?>

</div>