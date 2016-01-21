<?php
/* @var $this ConfiguracionForoController */
/* @var $model ConfiguracionForo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'configuracion-foro-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_post'); ?>
		<?php echo $form->textField($model,'cantidad_post'); ?>
		<?php echo $form->error($model,'cantidad_post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foro_id'); ?>
		<?php echo $form->textField($model,'foro_id'); ?>
		<?php echo $form->error($model,'foro_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->