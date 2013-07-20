<?php
/* @var $this CommitteeInvolvementController */
/* @var $data CommitteeInvolvement */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginSemester')); ?>:</b>
	<?php echo CHtml::encode($data->beginSemester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginYear')); ?>:</b>
	<?php echo CHtml::encode($data->beginYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endSemester')); ?>:</b>
	<?php echo CHtml::encode($data->endSemester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endYear')); ?>:</b>
	<?php echo CHtml::encode($data->endYear); ?>
	<br />


</div>