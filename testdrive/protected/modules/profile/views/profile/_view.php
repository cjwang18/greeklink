<?php
/* @var $this ProfileController */
/* @var $data Profile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('profileID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->profileID), array('view', 'id'=>$data->profileID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profilePic')); ?>:</b>
	<?php echo CHtml::encode($data->profilePic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chapter')); ?>:</b>
	<?php echo CHtml::encode($data->chapter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intramural')); ?>:</b>
	<?php echo CHtml::encode($data->intramural); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currentCity')); ?>:</b>
	<?php echo CHtml::encode($data->currentCity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hometown')); ?>:</b>
	<?php echo CHtml::encode($data->hometown); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('relationship')); ?>:</b>
	<?php echo CHtml::encode($data->relationship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interests')); ?>:</b>
	<?php echo CHtml::encode($data->interests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('music')); ?>:</b>
	<?php echo CHtml::encode($data->music); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movies')); ?>:</b>
	<?php echo CHtml::encode($data->movies); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tv')); ?>:</b>
	<?php echo CHtml::encode($data->tv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('books')); ?>:</b>
	<?php echo CHtml::encode($data->books); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('games')); ?>:</b>
	<?php echo CHtml::encode($data->games); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facebook')); ?>:</b>
	<?php echo CHtml::encode($data->facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twitter')); ?>:</b>
	<?php echo CHtml::encode($data->twitter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduationMonth')); ?>:</b>
	<?php echo CHtml::encode($data->graduationMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduationYear')); ?>:</b>
	<?php echo CHtml::encode($data->graduationYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gpa')); ?>:</b>
	<?php echo CHtml::encode($data->gpa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('honors')); ?>:</b>
	<?php echo CHtml::encode($data->honors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relevantCoursework')); ?>:</b>
	<?php echo CHtml::encode($data->relevantCoursework); ?>
	<br />

	*/ ?>

</div>