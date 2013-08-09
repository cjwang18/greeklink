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

	<?php
		// Show "Link With" only if logged in user not himself/herself
		if (Yii::app()->user->id != $data->userID) {
			//echo CHtml::link('Link With', array('link/create', 'link'=>$data->userID));
			echo CHtml::ajaxLink(
				"Link With",
				Yii::app()->createUrl( 'link/create' ),
				array( // ajaxOptions
					'success' => "function( data )
					{
						// handle return data
						switch(data) {
							case 1:
								break;
							case 2:
								break;
							case 3:
								break;
							default:
								alert('Link request sent successfully');
								break;
						}
					}",
					'data' => array( 'link' => $data->userID )
				)
			);
		}
	?>

</div>