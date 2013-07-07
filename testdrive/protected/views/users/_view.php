<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?>:</b>
	<?php //echo CHtml::encode($data->birthday); ?>
	<?php echo Yii::app()->dateFormatter->formatDateTime($data->birthday, 'short', false); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php 
		if ($data->gender==='m')
			echo CHtml::encode('Male');
		else
			echo CHtml::encode('Female');
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization')); ?>:</b>
	<?php echo CHtml::encode($data->organizationRel->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('initiationYear')); ?>:</b>
	<?php echo CHtml::encode($data->initiationYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->stateRel->stateFull); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university')); ?>:</b>
	<?php echo CHtml::encode($data->universityRel->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php
		if ($data->status==='+')
			echo CHtml::encode('Approved');
		else if ($data->status==='-')
			echo CHtml::encode('Denied');
		else
			echo CHtml::encode('Pending');
	?>
	<br />

	<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userID), array('view', 'id'=>$data->userID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	*/ ?>

</div>