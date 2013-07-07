<?php
/* @var $this ActivationController */

$this->pageTitle=Yii::app()->name . ' - Verification Confirmation';
$this->breadcrumbs=array(
	'Confirmation',
);
?>

<?php 
	// show name, birthday, gender, organization, initiation year, 
	// state, university, email
	echo $this->renderPartial('/users/_view', array('data'=>$user)); 
?>

<?php 
	if (Yii::app()->getRequest()->getQuery('status')==='+')
		echo 'The user has been successfully approved. Thank you for your time!';
	else if (Yii::app()->getRequest()->getQuery('status')==='-')
		echo 'The user has been denied. Thank you for your time!';
?>