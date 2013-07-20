<?php
/* @var $this PositionController */
/* @var $data Position */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profileID')); ?>:</b>
	<?php echo CHtml::encode($data->profileID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginSemester')); ?>:</b>
	<?php echo CHtml::encode($data->beginSemester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginYear')); ?>:</b>
	<?php echo CHtml::encode($data->beginYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endSemester')); ?>:</b>
	<?php echo CHtml::encode($data->endSemester); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('endYear')); ?>:</b>
	<?php echo CHtml::encode($data->endYear); ?>
	<br />

	*/ ?>

</div>