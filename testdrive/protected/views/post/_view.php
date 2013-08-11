<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('postID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->postID), array('view', 'id'=>$data->postID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post')); ?>:</b>
	<?php echo CHtml::encode($data->post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datePosted')); ?>:</b>
	<?php echo CHtml::encode($data->datePosted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upvotes')); ?>:</b>
	<?php echo CHtml::encode($data->upvotes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downvotes')); ?>:</b>
	<?php echo CHtml::encode($data->downvotes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('allowLinks')); ?>:</b>
	<?php echo CHtml::encode($data->allowLinks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowChapter')); ?>:</b>
	<?php echo CHtml::encode($data->allowChapter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowUni')); ?>:</b>
	<?php echo CHtml::encode($data->allowUni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowOrg')); ?>:</b>
	<?php echo CHtml::encode($data->allowOrg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allowAll')); ?>:</b>
	<?php echo CHtml::encode($data->allowAll); ?>
	<br />

	*/ ?>

</div>