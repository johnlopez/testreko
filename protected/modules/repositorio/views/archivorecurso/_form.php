<?php
/* @var $this ArchivorecursoController */
/* @var $model ArchivoRecurso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'archivo-recurso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($archivoRecurso); ?>

	<div class="row">
		<?php echo $form->labelEx($archivoRecurso,'nombre'); ?>
		<?php echo $form->textField($archivoRecurso,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($archivoRecurso,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($archivoRecurso,'descripcion'); ?>
		<?php echo $form->textArea($archivoRecurso,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($archivoRecurso,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($archivoRecurso,'fecha_creacion'); ?>
		<?php echo $form->textField($archivoRecurso,'fecha_creacion'); ?>
		<?php echo $form->error($archivoRecurso,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($archivoRecurso,'fecha_modificacion'); ?>
		<?php echo $form->textField($archivoRecurso,'fecha_modificacion'); ?>
		<?php echo $form->error($archivoRecurso,'fecha_modificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($archivoRecurso,'fecha_elminacion'); ?>
		<?php echo $form->textField($archivoRecurso,'fecha_elminacion'); ?>
		<?php echo $form->error($archivoRecurso,'fecha_elminacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($archivoRecurso,'fecha_acceso'); ?>
		<?php echo $form->textField($archivoRecurso,'fecha_acceso'); ?>
		<?php echo $form->error($archivoRecurso,'fecha_acceso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($archivoRecurso->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->