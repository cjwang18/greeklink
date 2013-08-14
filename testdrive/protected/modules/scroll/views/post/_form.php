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

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'post'); ?>
		<?php echo $form->textArea($model,'post',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'upvotes'); ?>
		<?php echo $form->textField($model,'upvotes',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'upvotes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'downvotes'); ?>
		<?php echo $form->textField($model,'downvotes',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'downvotes'); ?>
	</div> -->

<!-- 	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div> -->

	<div class="row">
	 	<br><b>Visible to</b><br>
	</div>

	<table style="width:50px;border:1px solid black;">
		<tr>
			<th>Links</th>
			<th>Chapter</th>
			<th>University</th>
			<th>Organization</th>
			<th>All</th>
		</tr>
		<tr>
			<td style="text-align:center"><?php echo CHtml::activeCheckBox($model,'allowLinks'); ?></td>
			<td style="text-align:center"><?php echo CHtml::activeCheckBox($model,'allowChapter'); ?></td>
			<td style="text-align:center"><?php echo CHtml::activeCheckBox($model,'allowUni'); ?></td>
			<td style="text-align:center"><?php echo CHtml::activeCheckBox($model,'allowOrg'); ?></td>
			<td style="text-align:center"><?php echo CHtml::activeCheckBox($model,'allowAll'); ?></td>
		</tr>
	</table>

<!-- 	<div class="row">
		<?php echo $form->labelEx($model,'allowLinks'); ?>
		<?php echo CHtml::activeCheckBox($model,'allowLinks'); ?>
		<?php echo $form->error($model,'allowLinks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allowChapter'); ?>
		<?php echo CHtml::activeCheckBox($model,'allowChapter'); ?>
		<?php echo $form->error($model,'allowChapter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allowUni'); ?>
		<?php echo CHtml::activeCheckBox($model,'allowUni'); ?>
		<?php echo $form->error($model,'allowUni'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allowOrg'); ?>
		<?php echo CHtml::activeCheckBox($model,'allowOrg'); ?>
		<?php echo $form->error($model,'allowOrg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allowAll'); ?>
		<?php echo CHtml::activeCheckBox($model,'allowAll'); ?>
		<?php echo $form->error($model,'allowAll'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Post' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->