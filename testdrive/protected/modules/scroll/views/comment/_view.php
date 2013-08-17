<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('commentID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->commentID), array('view', 'id'=>$data->commentID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postID')); ?>:</b>
	<?php echo CHtml::encode($data->postID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCommented')); ?>:</b>
	<?php echo CHtml::encode($data->dateCommented); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author0->name); ?>
	<br />

</div>