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

	<!-- TODO: Display only if calling controller action is Row -->
	<!-- <div class="row">
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
	</table> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Post' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->