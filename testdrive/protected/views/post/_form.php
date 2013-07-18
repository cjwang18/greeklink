<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'post'); ?>
		<?php echo $form->textArea($model,'post',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datePosted'); ?>
		<?php echo $form->textField($model,'datePosted'); ?>
		<?php echo $form->error($model,'datePosted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upvotes'); ?>
		<?php echo $form->textField($model,'upvotes',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'upvotes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'downvotes'); ?>
		<?php echo $form->textField($model,'downvotes',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'downvotes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->