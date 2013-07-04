<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->layout='landing';
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="divFormCenter">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'form-signin',
		),
	)); ?>

		<div class="divLogo">
			<h1 class="form-signin-heading text-center" >GreekLink</h1>
		</div>

		<?php echo $form->textField($model,'email', array(
			'class'=>'input-block-level',
			'placeholder'=>'Email',
		)); ?>
		<?php echo $form->error($model,'email'); ?>

		<?php echo $form->passwordField($model,'password', array(
			'class'=>'input-block-level',
			'placeholder'=>'Password',
		)); ?>
		<?php echo $form->error($model,'password'); ?>

		<?php echo CHtml::submitButton('Log in', array(
			'class'=>'btn btn-large btn-primary btn-block button-padding button-margin',
		)); ?>

		<?php //echo CHtml::htmlButton('Forgot password?', array(
			//'class'=>'btn btn-large button-margin button-half',
		//)); ?>

		<?php //echo CHtml::htmlButton('Sign up', array(
			//'class'=>'btn btn-large button-margin button-half pull-right',
			//'submit'=>array('site/signup'),
		//)); ?>

		<?php echo CHtml::link('Forgot password?',array('site/passwordRecovery'),array('class'=>'btn btn-large button-margin button-half')); ?>

		<?php echo CHtml::link('Sign up',array('users/create'),array('class'=>'btn btn-large button-margin button-half pull-right')); ?>

	<?php $this->endWidget(); ?>
</div>