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
			GreekLink
		</div>

		<div class="form-signin-contents">

			<?php echo $form->textField($model,'email', array(
				'class'=>'',
				'placeholder'=>'Email',
			)); ?>
			<?php echo $form->error($model,'email'); ?>

			<?php echo $form->passwordField($model,'password', array(
				'class'=>'form-topMargin',
				'placeholder'=>'Password',
			)); ?>
			<?php echo $form->error($model,'password'); ?>

			<?php echo CHtml::submitButton('Log in', array(
				'class'=>'form-signin-login',
			)); ?>

			<?php //echo CHtml::htmlButton('Forgot password?', array(
				//'class'=>'btn btn-large button-margin button-half',
			//)); ?>

			<?php //echo CHtml::htmlButton('Sign up', array(
				//'class'=>'btn btn-large button-margin button-half pull-right',
				//'submit'=>array('site/signup'),
			//)); ?>

			<?php echo CHtml::link('Forgot password?',array('site/passwordRecovery'),array('class'=>'form-signin-buttons')); ?>

			<?php echo CHtml::link('Sign up',array('users/create'),array('class'=>'form-signin-buttons')); ?>

		</div>

	<?php $this->endWidget(); ?>
</div>