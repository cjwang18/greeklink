<?php
/* @var $this LinkController */
/* @var $data Link */
?>

<div class="view">

	<?php
		if ($data->owner == Yii::app()->user->id) {
			echo '<b>'.CHtml::encode($data->getAttributeLabel('link')).': </b>';
			echo CHtml::link($data->link0->name, array('/profile/profile/view', 'id'=>$data->link0->profileID)).'<br>';
		} else {
			echo '<b>'.CHtml::encode($data->getAttributeLabel('owner')).': </b>';
			echo CHtml::link($data->owner0->name, array('/profile/profile/view', 'id'=>$data->owner0->profileID)).'<br>';
		}
	?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateLinked')); ?>:</b>
	<?php echo Yii::app()->dateFormatter->formatDateTime($data->dateLinked, 'short', false); ?>
	<br />

</div>