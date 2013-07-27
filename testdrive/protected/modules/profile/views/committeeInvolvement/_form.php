<?php
/* @var $this CommitteeInvolvementController */
/* @var $model CommitteeInvolvement */
?>

<div class="instance">

	<br>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']name'); ?>
		<?php echo CHtml::activeTextField($model,'[' . $index . ']name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']name'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']beginSemester'); ?>
		<?php echo CHtml::activeDropDownList($model, '[' . $index . ']beginSemester', $model->semesterOptions, array('prompt' => 'Select Semester')); ?>
		<?php echo CHtml::error($model,'[' . $index . ']beginSemester'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']beginYear'); ?>
		<?php echo CHtml::activeTextField($model,'[' . $index . ']beginYear',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']beginYear'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']present'); ?>
		<?php echo CHtml::activeCheckBox($model,'[' . $index . ']present', array('onclick' => 'presentToggle(this);', 'class'=>'presentCB')); ?>
		<?php echo CHtml::error($model,'[' . $index . ']present'); ?>
	</div>

	<div class="endDate">
		<div class="row">
			<?php echo CHtml::activeLabelEx($model,'[' . $index . ']endSemester'); ?>
			<?php echo CHtml::activeDropDownList($model, '[' . $index . ']endSemester', $model->semesterOptions, array('prompt' => 'Select Semester','class'=>'endDateField')); ?>
			<?php echo CHtml::error($model,'[' . $index . ']endSemester'); ?>
		</div>

		<div class="row">
			<?php echo CHtml::activeLabelEx($model,'[' . $index . ']endYear'); ?>
			<?php echo CHtml::activeTextField($model,'[' . $index . ']endYear',array('size'=>4,'maxlength'=>4,'class'=>'endDateField')); ?>
			<?php echo CHtml::error($model,'[' . $index . ']endYear'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this, ' . $index . '); return false;')); ?>
	</div>

</div><!-- form -->
