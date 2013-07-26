<?php
/* @var $this ProfileController */
/* @var $userData Users */
/* @var $profileData Profile */
?>


	<!-- TODO: Need to style and insert profile picture -->
	<br />
	<div class="box ">
		<div class="divProfileCenter rightAlign ">	
			<div class="divProfileHeader transparentWhite divShadow">	

			<span class="nameFont"><?php echo CHtml::encode($userData->name); ?></span>
			<br />

			<span class="titleFont"><?php echo CHtml::encode($userData->organizationRel->name).','; ?></span>
			<?php echo 'Initiated '.CHtml::encode($userData->initiationYear); ?>
			<br />

			<span class="titleFont"><?php echo CHtml::encode($userData->universityRel->name).','; ?></span>
			<?php echo 'Class of '.CHtml::encode($profileData->graduationYear); ?>
			<br />

			</div>
	</div>
</div>
