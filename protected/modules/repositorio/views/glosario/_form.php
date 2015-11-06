<?php
/* @var $this GlosarioController */
/* @var $model Glosario */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'glosario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($glosario); ?>
        
	<div class="row">
		<?php echo $form->labelEx($glosario,'nombre'); ?>
		<?php echo $form->textField($glosario,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($glosario,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($glosario,'descripcion'); ?>
		<?php echo $form->textArea($glosario,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($glosario,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($glosario,'fecha_creacion'); ?>
		<?php echo $form->textField($glosario,'fecha_creacion'); ?>
		<?php echo $form->error($glosario,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($glosario,'fecha_modificacion'); ?>
		<?php echo $form->textField($glosario,'fecha_modificacion'); ?>
		<?php echo $form->error($glosario,'fecha_modificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($glosario,'fecha_eliminacion'); ?>
		<?php echo $form->textField($glosario,'fecha_eliminacion'); ?>
		<?php echo $form->error($glosario,'fecha_eliminacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($glosario,'fecha_acceso'); ?>
		<?php echo $form->textField($glosario,'fecha_acceso'); ?>
		<?php echo $form->error($glosario,'fecha_acceso'); ?>
	</div>                

	<div class="row buttons">
		<?php echo CHtml::submitButton($glosario->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->