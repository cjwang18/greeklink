<?php
/* @var $this LinkController */
/* @var $data Link */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner0->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateRequested')); ?>:</b>
	<?php echo Yii::app()->dateFormatter->formatDateTime($data->dateRequested, 'short', false); ?>
	<br />

	<?php echo CHtml::link('Approve', array('approve', 'id'=>$data->owner)); ?>

	<?php echo CHtml::link('Deny', array('deny', 'id'=>$data->owner)); ?>

</div>