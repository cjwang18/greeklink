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

<div class="box">
	<div class="divLogo">
		<div class="logoLeft">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gl_logo.png">
		</div>
		<div class="logoRight">
			<span class="title">Greek<br>Link</span><br>
			<span class="desc">Find, connect, and share with <br>Greeks from your college, <br>chapter, and nationwide. <br>For students and alumni.</span>
		</div>
	</div>

	<div class="loginDiv">
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

			<div class="form-signin-contents">

				<?php echo $form->textField($model,'email', array(
					'class'=>'',
					'placeholder'=>'Email',
				)); ?>
				

				<?php echo $form->passwordField($model,'password', array(
					'class'=>'form-password',
					'placeholder'=>'Password',
				)); ?>

				<?php echo CHtml::submitButton('SIGN IN', array(
					'class'=>'form-signin-login',
					'id'=>'LoginForm_login'
				)); ?>

				<?php //echo CHtml::htmlButton('Forgot password?', array(
					//'class'=>'btn btn-large button-margin button-half',
				//)); ?>

				<?php //echo CHtml::htmlButton('Sign up', array(
					//'class'=>'btn btn-large button-margin button-half pull-right',
					//'submit'=>array('site/signup'),
				//)); ?>

				<div class="form-signin-links">
					<?php echo CHtml::link('Forgot password?',array('site/passwordRecovery'),array('class'=>'')); ?>
				</div>

				<!-- <?php echo CHtml::link('Sign up',array('users/create'),array('class'=>'form-signin-buttons')); ?> -->


				<?php //echo $form->error($model,'email'); ?>
				<?php //echo $form->error($model,'password'); ?>
			</div>
		<?php $this->endWidget(); ?>

		<div class="signup-msg">
			<div class="signup-msg-contents">
				Not on GreekLink?
				<?php echo CHtml::link('SIGN UP',array('users/create'),array('class'=>'signup-msg-buttons', 'id'=>'signup-button')); ?>
				<p>It's simple, quick, and free.</p>
				<?php echo CHtml::link('RUSH 2013',array('users/rush'),array('class'=>'signup-msg-buttons', 'id'=>'rush-button')); ?>
				<p>
					Applying to a fraternity or sorority? Learn about and apply for Greek organizations at your school with GreekLink's rush tool.
				</p>
			</div>
		</div>
	</div>

	

	<div class="loginErrorSummary">
		<?php echo $form->errorSummary($model); ?>
	</div>
</div>