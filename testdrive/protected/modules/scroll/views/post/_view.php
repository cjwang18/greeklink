<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('postID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->postID), array('view', 'id'=>$data->postID)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('post')); ?>:</b>
	<?php echo CHtml::encode($data->post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datePosted')); ?>:</b>
	<?php echo Yii::app()->dateFormatter->format('EEE, MMM d, h:mm a', $data->datePosted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upvotes')); ?>:</b>
	<?php echo '<span id="post'.$data->postID.'upvotes">'.CHtml::encode($data->upvotes).'</span>'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downvotes')); ?>:</b>
	<?php echo '<span id="post'.$data->postID.'downvotes">'.CHtml::encode($data->downvotes).'</span>'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author0->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner0->name); ?>
	<br />

<<<<<<< HEAD
	<?php echo CHtml::link('Reply',array('/scroll/comment/create', 'postID'=>$data->postID)); ?>

	
	<?php

		foreach ($data->comments as $c) {
			echo '<div class="commentContainer">';
				echo '<b>'.CHtml::encode($c->author0->name).' ('.CHtml::encode($c->dateCommented).'): </b>';
				echo CHtml::encode($c->comment);


			echo '</div>';
		}
	?>

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
=======
	<?php
		echo CHtml::ajaxButton(
			'Yay', 
			Yii::app()->createUrl('scroll/vote/yay'),
			// ajaxOptions
			array(
				'data' => array(
					'postID' => $data->postID,
					'userID' => Yii::app()->user->id, // vote caster
				),
				'success' => "
				function(data) {
					$('#post".$data->postID."upvotes').html(data);
				}
				"
			)
		);
	?>
>>>>>>> 4f4b492306dbb5d83c65e6a413cb499b6bc843f4

	<?php
		echo CHtml::ajaxButton(
			'Nay', 
			Yii::app()->createUrl('scroll/vote/nay'),
			// ajaxOptions
			array(
				'data' => array(
					'postID' => $data->postID,
					'userID' => Yii::app()->user->id, // vote caster
				),
				'success' => "
				function(data) {
					$('#post".$data->postID."downvotes').html(data);
				}
				"
			)
		);
	?>

</div>