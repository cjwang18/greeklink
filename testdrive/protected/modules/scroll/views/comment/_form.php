<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'postID'); ?>
		<?php echo $form->textField($model,'postID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'postID'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'dateCommented'); ?>
		<?php echo $form->textField($model,'dateCommented'); ?>
		<?php echo $form->error($model,'dateCommented'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->