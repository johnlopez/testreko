<?php
/* @var $this ConfiguracionForoController */
/* @var $model ConfiguracionForo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad_post'); ?>
		<?php echo $form->textField($model,'cantidad_post'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'foro_id'); ?>
		<?php echo $form->textField($model,'foro_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->