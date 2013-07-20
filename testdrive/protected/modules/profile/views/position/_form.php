<?php
/* @var $this PositionController */
/* @var $model Position */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'position-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'profileID'); ?>
		<?php echo $form->textField($model,'profileID',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'profileID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beginSemester'); ?>
		<?php echo $form->textField($model,'beginSemester',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'beginSemester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beginYear'); ?>
		<?php echo $form->textField($model,'beginYear',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'beginYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endSemester'); ?>
		<?php echo $form->textField($model,'endSemester',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'endSemester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endYear'); ?>
		<?php echo $form->textField($model,'endYear',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'endYear'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->