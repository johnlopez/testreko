<?php
/* @var $this GlosarioterminodefinicionController */
/* @var $model GlosarioTerminoDefinicion */
/* @var $form CActiveForm */
//var_dump($glosario);


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'glosario-termino-definicion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'termino'); ?>
		<?php echo $form->textField($model,'termino',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'termino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'definicion'); ?>
		<?php echo $form->textArea($model,'definicion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'definicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
		<?php echo $form->error($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_modificacion'); ?>
		<?php echo $form->textField($model,'fecha_modificacion'); ?>
		<?php echo $form->error($model,'fecha_modificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_acceso'); ?>
		<?php echo $form->textField($model,'fecha_acceso'); ?>
		<?php echo $form->error($model,'fecha_acceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_eliminacion'); ?>
		<?php echo $form->textField($model,'fecha_eliminacion'); ?>
		<?php echo $form->error($model,'fecha_eliminacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'glosario_id'); ?>
		<?php echo $form->textField($model,'glosario_id'); ?>
		<?php echo $form->error($model,'glosario_id'); ?>
	</div>
                <?php echo $form->hiddenField($glosario,'id',array('value'=>$glosario->id)); ?>
                <?php echo $form->hiddenField($glosario,'nombre',array('value'=>$glosario->nombre)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->