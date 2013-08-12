<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'postID'); ?>
		<?php echo $form->textField($model,'postID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post'); ?>
		<?php echo $form->textArea($model,'post',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datePosted'); ?>
		<?php echo $form->textField($model,'datePosted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'upvotes'); ?>
		<?php echo $form->textField($model,'upvotes',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'downvotes'); ?>
		<?php echo $form->textField($model,'downvotes',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allowLinks'); ?>
		<?php echo $form->textField($model,'allowLinks'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allowChapter'); ?>
		<?php echo $form->textField($model,'allowChapter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allowUni'); ?>
		<?php echo $form->textField($model,'allowUni'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allowOrg'); ?>
		<?php echo $form->textField($model,'allowOrg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allowAll'); ?>
		<?php echo $form->textField($model,'allowAll'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->