<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<?php
		if ($data->profile->profilePic) {
			$folder = 'images/profilePics/';
			$cacheImg = $folder.'thumbs/'.$data->profile->profilePic;
			// Check if cached thumb already exists
			if (!file_exists($cacheImg)) {
				$thumb = Yii::app()->phpThumb->create($folder.$data->profile->profilePic);
				$thumb->adaptiveResize(100,100);
				$thumb->save($cacheImg);
			}
			echo CHtml::image(Yii::app()->request->baseUrl.'/'.$cacheImg, "image").'<br>';
		}
	?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization')); ?>:</b>
	<?php echo CHtml::encode($data->organizationRel->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->stateRel->stateFull); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university')); ?>:</b>
	<?php echo CHtml::encode($data->universityRel->name); ?>
	<br />

	<!-- Need to add graduation year and concentrations -->
	<?php
		if ($data->profile->graduationYear && $data->profile->graduationYear != '0000') {
			echo '<b>'.CHtml::encode($data->profile->getAttributeLabel('graduationYear')).': </b>';
			echo CHtml::encode($data->profile->graduationYear).'<br>';
		}
	?>

	<?php
		if ($data->profile->profilesConcentrations) {
			echo '<b>'.CHtml::encode('Concentration(s)').': </b>';
			foreach ($data->profile->profilesConcentrations as $c) {
				echo '<br>'.CHtml::encode($c->concentration);
			}
			echo '<br>';
		}
	?>

	<?php echo CHtml::link('Link With', array('link/create')); ?>

</div>