<?php
/* @var $this SkillController */
/* @var $model Skill */
?>

<div class="form">

	<br>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']category'); ?>
		<?php echo CHtml::activeTextField($model,'[' . $index . ']category',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']category'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']skills'); ?>
		<?php echo CHtml::activeTextArea($model,'[' . $index . ']skills',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']skills'); ?>
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