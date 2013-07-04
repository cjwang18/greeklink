<?php
/* @var $this StatesController */
/* @var $data States */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('stateID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->stateID), array('view', 'id'=>$data->stateID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stateAbbr')); ?>:</b>
	<?php echo CHtml::encode($data->stateAbbr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stateFull')); ?>:</b>
	<?php echo CHtml::encode($data->stateFull); ?>
	<br />


</div>