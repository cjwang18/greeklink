<?php
/* @var $this ConcentrationController */
/* @var $model Concentration */
?>

<div class="instance">

	<br>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']concentration'); ?>
		<?php echo CHtml::activeTextField($model,'[' . $index . ']concentration',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']concentration'); ?>
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
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']endSemester'); ?>
		<?php echo CHtml::activeDropDownList($model, '[' . $index . ']endSemester', $model->semesterOptions, array('prompt' => 'Select Semester')); ?>
		<?php echo CHtml::error($model,'[' . $index . ']endSemester'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']endYear'); ?>
		<?php echo CHtml::activeTextField($model,'[' . $index . ']endYear',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']endYear'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this, ' . $index . '); return false;')); ?>
	</div>

</div><!-- form -->

<?php
Yii::app()->clientScript->registerScript('deleteChild', "
function deleteChild(elm, index)
{
	element=$(elm).parent().parent();
	/* animate div */
	$(element).animate(
	{
		opacity: 0.25, 
		left: '+=50', 
		height: 'toggle'
	}, 500,
	function() {
		/* remove div */
		$(element).remove();
	});
}", CClientScript::POS_END);