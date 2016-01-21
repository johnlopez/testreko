<?php
/* @var $this RecepciontrabajoController */
/* @var $model RecepcionTrabajo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recepcion-trabajo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($recepcionTrabajo); ?>

	<div class="row">
		<?php echo $form->labelEx($recepcionTrabajo,'nombre'); ?>
		<?php echo $form->textField($recepcionTrabajo,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($recepcionTrabajo,'nombre'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($recepcionTrabajo,'entrega_publica'); ?>
		<?php echo $form->checkBox($recepcionTrabajo,'entrega_publica'); ?>
		<?php echo $form->error($recepcionTrabajo,'entrega_publica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($recepcionTrabajo,'descripcion'); ?>
		<?php echo $form->textArea($recepcionTrabajo,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($recepcionTrabajo,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($recepcionTrabajo,'fecha_creacion'); ?>
		<?php echo $form->textField($recepcionTrabajo,'fecha_creacion'); ?>
		<?php echo $form->error($recepcionTrabajo,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($recepcionTrabajo,'fecha_modificacion'); ?>
		<?php echo $form->textField($recepcionTrabajo,'fecha_modificacion'); ?>
		<?php echo $form->error($recepcionTrabajo,'fecha_modificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($recepcionTrabajo,'fecha_eliminacion'); ?>
		<?php echo $form->textField($recepcionTrabajo,'fecha_eliminacion'); ?>
		<?php echo $form->error($recepcionTrabajo,'fecha_eliminacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($recepcionTrabajo,'fecha_acceso'); ?>
		<?php echo $form->textField($recepcionTrabajo,'fecha_acceso'); ?>
		<?php echo $form->error($recepcionTrabajo,'fecha_acceso'); ?>
	</div>       

	<div class="row buttons">
		<?php echo CHtml::submitButton($recepcionTrabajo->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->