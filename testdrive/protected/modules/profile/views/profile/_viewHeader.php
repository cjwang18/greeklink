<?php
/* @var $this ProfileController */
/* @var $userData Users */
/* @var $profileData Profile */
?>


<!-- TODO: Need to style -->
<br />
<div class="box ">
<div class="divHeader">
	<div class="divProfilePic divShadow transparentWhite">
		<?php
			if ($profileData->profilePic) {
				$folder = 'images/profilePics/';
				$cacheImg = $folder.'thumbs/'.$profileData->profilePic;
				// Check if cached thumb already exists
				if (!file_exists($cacheImg)) {
					$thumb = Yii::app()->phpThumb->create($folder.$profileData->profilePic);
					$thumb->adaptiveResize(100,100);
					$thumb->save($cacheImg);
				}
				echo CHtml::image(Yii::app()->request->baseUrl.'/'.$cacheImg, "image").'<br>';
			}
		?>
	</div>

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

			<?php echo CHtml::link('Edit Profile', array('update', 'id'=>$profileData->profileID)); ?>

			<?php echo CHtml::link('Scroll',array('/scroll/post/scroll', 'ownerID'=>$profileData->userID)); ?>

		</div>
	</div>
	</div>
</div>
