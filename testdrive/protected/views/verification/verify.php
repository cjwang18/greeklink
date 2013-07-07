<?php
/* @var $this ActivationController */

$this->pageTitle=Yii::app()->name . ' - Verify User';
$this->breadcrumbs=array(
	'Verify',
);
?>

<?php 
	// show name, birthday, gender, organization, initiation year, 
	// state, university, email
	echo $this->renderPartial('/users/_view', array('data'=>$user)); 
?>


<?php echo CHtml::link('Approve', array('approve', 'id'=>$user->userID)); ?>

<?php echo CHtml::link('Deny', array('deny', 'id'=>$user->userID)); ?>