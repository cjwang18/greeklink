<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="suFormCenter">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
			'class'=>'form-signup',
		),
	)); ?>

		<div class="rushLogo">Rush</div>

		<div class="form-signin-contents">
			

			<?php echo $form->textField($model,'name',array(
				'size'=>60,
				'maxlength'=>128,
				'class'=>'form-su-fullWidth form-su-name',
				'placeholder'=>'Name',
			)); ?>
			<?php //echo $form->error($model,'name'); ?>

			<?php 
				/*echo $form->dateField($model,'birthday', array(
					'class'=>'form-topMargin form-su-datePicker',
					'placeholder'=>'Birthday',
				));*/

				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					// 'name'=>'birthday',
					'model'=>$model, // the name of the field
					'attribute'=>'birthday',  // pre-fill the value
					// additional javascript options for the date picker plugin
					'options'=>array(
						'showAnim'=>'fold',
						'debug'=>true,
						'constrainInput' => 'true',
						'changeMonth' => 'true',
						'changeYear' => 'true',
					),
					'htmlOptions'=>array(
						'class'=>'form-topMargin form-su-datePicker',
						'placeholder'=>'Birthday (mm/dd/yyyy)',
					),
				));
			?>
			<?php //echo $form->error($model,'birthday'); ?>

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
			<?php //echo $form->error($model,'gender'); ?>

			<?php
				$orgArr = array();
				if (isset($_POST['Users']['gender']))
					$orgArr = $this->getOrganizationsList($_POST['Users']['gender']);

				echo CHtml::activeDropDownList($model, 'organization', $orgArr,
				array(
					'prompt'=>'Select Organization',
					'class'=>'form-topMargin form-su-org',
					'id'=>'organization_id'
				)); ?>
			<?php //echo $form->error($model,'organization'); ?>

			<?php echo $form->textField($model,'initiationYear',array(
				'size'=>4,
				'maxlength'=>4,
				'class'=>'form-topMargin form-su-initYear',
				'placeholder'=>'Initiation Year'
			)); ?>
			<?php //echo $form->error($model,'initiationYear'); ?>

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
						'class'=>'form-topMargin form-su-state'
						)
					);
			?>
			<?php //echo $form->error($model,'state'); ?>

			<?php
				$uniArr = array();
				if (isset($_POST['Users']['state']))
					$uniArr = $this->getUniversitiesList($_POST['Users']['state']);

				echo CHtml::activeDropDownList($model,'university', $uniArr, 
				array(
					'empty'=>'Select University',
					'class'=>'form-topMargin form-su-university',
					'id'=>'university_id'
				)
			); ?>
			<?php //echo $form->error($model,'university'); ?>

			<?php echo $form->textField($model,'email',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'form-topMargin form-su-email',
					'placeholder'=>'Email',
				)
			); ?>
			<?php echo $form->textField($model,'repeatEmail',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'form-topMargin form-su-email',
					'placeholder'=>'Confirm Email',
				)
			); ?>
			<?php //echo $form->error($model,'email'); ?>

			<?php echo $form->passwordField($model,'password',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'form-topMargin rightMargin form-su-password',
					'placeholder'=>'Password',
				)
			); ?>
			<?php echo $form->passwordField($model,'repeatPassword',
				array(
					'size'=>60,
					'maxlength'=>128,
					'class'=>'form-topMargin form-su-password',
					'placeholder'=>'Confirm Password',
				)
			); ?>
			<?php //echo $form->error($model,'password'); ?>

			<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

			<?php echo CHtml::submitButton('Sign up', array(
				'class'=>'form-signin-login',
			)); ?>

		</div>
		
	<?php $this->endWidget(); ?>

</div><!-- form -->


	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->error($model,'name'); ?>
	<?php //echo $form->error($model,'birthday'); ?>
	<?php //echo $form->error($model,'gender'); ?>
	<?php //echo $form->error($model,'organization'); ?>
	<?php //echo $form->error($model,'initiationYear'); ?>
	<?php //echo $form->error($model,'state'); ?>
	<?php //echo $form->error($model,'university'); ?>
	<?php //echo $form->error($model,'email'); ?>
	<?php //echo $form->error($model,'password'); ?>
