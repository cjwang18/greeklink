<?php
/* @var $this OrganizationsController */
/* @var $data Organizations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('orgID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->orgID), array('view', 'id'=>$data->orgID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('symbol')); ?>:</b>
	<?php echo CHtml::encode($data->symbol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />


</div>