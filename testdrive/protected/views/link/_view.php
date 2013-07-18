<?php
/* @var $this LinkController */
/* @var $data Link */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->linkID), array('view', 'id'=>$data->linkID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateLinked')); ?>:</b>
	<?php echo CHtml::encode($data->dateLinked); ?>
	<br />


</div>