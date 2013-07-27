<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */
?>

<div class="instance">

	<br>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']name'); ?>
		<?php echo CHtml::activeTextField($model,'[' . $index . ']name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']name'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']description'); ?>
		<?php echo CHtml::activeTextArea($model,'[' . $index . ']description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']description'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']beginMonth'); ?>
		<?php echo CHtml::activeDropDownList($model, '[' . $index . ']beginMonth', $model->monthOptions, array('prompt' => 'Select Month')); ?>
		<?php echo CHtml::error($model,'[' . $index . ']beginMonth'); ?>
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
			<?php echo CHtml::activeLabelEx($model,'[' . $index . ']endMonth'); ?>
			<?php echo CHtml::activeDropDownList($model, '[' . $index . ']endMonth', $model->monthOptions, array('prompt' => 'Select Month','class'=>'endDateField')); ?>
			<?php echo CHtml::error($model,'[' . $index . ']endMonth'); ?>
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
