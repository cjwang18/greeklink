<?php
/* @var $this ProfileController */
/* @var $userData Users */
/* @var $profileData Profile */
?>

<div class='view'>

	<!-- TODO: Need to style and insert profile picture -->

	<b><?php echo CHtml::encode($userData->name); ?></b>
	<br />

	<?php echo CHtml::encode($userData->organizationRel->name).','; ?>
	<?php echo 'Initiated '.CHtml::encode($userData->initiationYear); ?>
	<br />

	<?php echo CHtml::encode($userData->universityRel->name).','; ?>
	<?php echo 'Class of '.CHtml::encode($profileData->graduationYear); ?>
	<br />

</div>