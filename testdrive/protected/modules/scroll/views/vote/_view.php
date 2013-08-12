<?php
/* @var $this VoteController */
/* @var $data Vote */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('voteID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->voteID), array('view', 'id'=>$data->voteID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postID')); ?>:</b>
	<?php echo CHtml::encode($data->postID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />


</div>