<?php
/* @var $this CommitteeInvolvementController */
/* @var $model CommitteeInvolvement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'committee-involvement-form',
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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beginSemester'); ?>
		<?php echo $form->dropDownList($model, 'beginSemester', $model->semesterOptions, array('prompt' => 'Select Semester')); ?>
		<?php echo $form->error($model,'beginSemester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beginYear'); ?>
		<?php echo $form->textField($model,'beginYear',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'beginYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endSemester'); ?>
		<?php echo $form->dropDownList($model, 'endSemester', $model->semesterOptions, array('prompt' => 'Select Semester')); ?>
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