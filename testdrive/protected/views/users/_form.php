<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="divFormCenter">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
			'class'=>'form-signup',
		),
	)); ?>

		<div class="rushLogo">Rush</div>

		<div class="form-signin-contents">
			<?php //echo $form->errorSummary($model); ?>

			<?php echo $form->textField($model,'name',array(
				'size'=>60,
				'maxlength'=>128,
				'class'=>'form-su-fullWidth',
				'placeholder'=>'Name',
			)); ?>
			<?php echo $form->error($model,'name'); ?>

			<?php echo $form->dateField($model,'birthday', array(
				'class'=>'form-topMargin form-su-datePicker',
				'placeholder'=>'Birthday',
			)); ?>
			<?php echo $form->error($model,'birthday'); ?>

			<?php 
				$genders = array(
					'f' => Yii::t('fim','Female'), 
					'm' => Yii::t('fim','Male'), 
				);
				echo $form->dropDownList($model, 'gender', $genders, 
					array(
						'prompt' => 'Select Gender',
						'ajax' => array(
							'type' => 'POST',
							'url' => CController::createUrl('loadOrganizations'),
							'update' => '#organization_id',
						),
						'class'=>'form-topMargin form-su-gender',
					)
				);
			?>
			<?php echo $form->error($model,'gender'); ?>

			<?php echo CHtml::activeDropDownList($model, 'organization', array(), 
				array(
					'prompt'=>'Select Organization',
					'class'=>'form-topMargin form-su-org',
					'id'=>'organization_id'
				)); ?>
			<?php echo $form->error($model,'organization'); ?>

			<?php echo $form->textField($model,'initiationYear',array(
				'size'=>4,
				'maxlength'=>4,
				'class'=>'form-topMargin form-su-initYear',
				'placeholder'=>'Initiation Year'
			)); ?>
			<?php echo $form->error($model,'initiationYear'); ?>

			<?php 
				$states = CHtml::listData(States::model()->findAll(), 'stateID', 'stateAbbr');
				echo $form->dropDownList($model, 'state', $states, 
					array(
						'prompt' => 'Select State',
						'ajax' => array(
							'type' => 'POST',
							'url' => CController::createUrl('loadUniversities'),
							'update' => '#university_id',
							),
						'class'=>'form-topMargin form-su-halfWidth'
						)					
					);
			?>
			<?php echo $form->error($model,'state'); ?>

			<?php echo CHtml::activeDropDownList($model,'university', array(), 
				array(
					'empty'=>'Select University',
					'class'=>'form-topMargin',
					'id'=>'university_id'
				)
			); ?>
			<?php echo $form->error($model,'university'); ?>

			<?php echo $form->textField($model,'email',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'su-textfield-width',
					'placeholder'=>'Email',
				)
			); ?>
			<?php echo $form->textField($model,'repeatEmail',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'signup-width',
					'placeholder'=>'Confirm Email',
				)
			); ?>
			<?php echo $form->error($model,'email'); ?>

			<?php echo $form->passwordField($model,'password',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'signup-width',
					'placeholder'=>'Password',
				)
			); ?>
			<?php echo $form->passwordField($model,'repeatPassword',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'signup-width',
					'placeholder'=>'Confirm Password',
				)
			); ?>
			<?php echo $form->error($model,'password'); ?>

			<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

			<?php echo CHtml::submitButton('Sign up', array(
				'class'=>'form-signin-login',
			)); ?>

		</div>
		
	<?php $this->endWidget(); ?>

</div><!-- form -->