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
			$folder = 'images/profilePics/';
			if ($profileData->profilePic) {
				$thumb = Yii::app()->phpThumb->create($folder.$profileData->profilePic);
				$thumb->adaptiveResize(100,100);
				$cacheImg = $folder.'thumbs/'.$profileData->profilePic;
				$thumb->save($cacheImg);
				echo CHtml::image(Yii::app()->request->baseUrl.'/'.$cacheImg, "image");
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

		</div>
	</div>
	</div>
</div>
