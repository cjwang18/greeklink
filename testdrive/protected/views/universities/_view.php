<?php
/* @var $this UniversitiesController */
/* @var $data Universities */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('universityID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->universityID), array('view', 'id'=>$data->universityID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />


</div>