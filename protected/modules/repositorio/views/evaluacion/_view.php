<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modifcacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modifcacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_eliminacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_eliminacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_acceso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_acceso); ?>
	<br />


</div>