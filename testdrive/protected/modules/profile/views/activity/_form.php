<?php
/* @var $this ActivityController */
/* @var $model Activity */
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
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']endMonth'); ?>
		<?php echo CHtml::activeDropDownList($model, '[' . $index . ']endMonth', $model->monthOptions, array('prompt' => 'Select Month')); ?>
		<?php echo CHtml::error($model,'[' . $index . ']endMonth'); ?>
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