<?php
/* @var $this ActivityController */
/* @var $data Activity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profileID')); ?>:</b>
	<?php echo CHtml::encode($data->profileID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginMonth')); ?>:</b>
	<?php echo CHtml::encode($data->beginMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginYear')); ?>:</b>
	<?php echo CHtml::encode($data->beginYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endMonth')); ?>:</b>
	<?php echo CHtml::encode($data->endMonth); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('endYear')); ?>:</b>
	<?php echo CHtml::encode($data->endYear); ?>
	<br />

	*/ ?>

</div>