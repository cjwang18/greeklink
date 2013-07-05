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
			'class'=>'form-signin',
		),
	)); ?>

		<h1 class="form-signin-heading text-center" >Rush</h1>

		<?php //echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'name',array(
			'size'=>60,
			'maxlength'=>128,
			'class'=>'input-block-level',
			'placeholder'=>'Name',
		)); ?>
		<?php echo $form->error($model,'name'); ?>

		<?php echo $form->dateField($model,'birthday', array(
			'class'=>'span2',
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
					'class'=>'span2 pull-right',
				)
			);
		?>
		<?php echo $form->error($model,'gender'); ?>

		<?php echo CHtml::activeDropDownList($model, 'organization', array(), 
			array(
				'prompt'=>'Select Organization',
				'class'=>'span2',
				'id'=>'organization_id'
			)); ?>
		<?php echo $form->error($model,'organization'); ?>

		<?php echo $form->textField($model,'initiationYear',array(
			'size'=>4,
			'maxlength'=>4,
			'class'=>'span2 pull-right',
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
					'class'=>'span2'
					)					
				);
		?>
		<?php echo $form->error($model,'state'); ?>

		<?php echo CHtml::activeDropDownList($model,'university', array(), 
			array(
				'empty'=>'Select University',
				'class'=>'span2 pull-right',
				'id'=>'university_id'
			)
		); ?>
		<?php echo $form->error($model,'university'); ?>

		<?php echo $form->textField($model,'email',
			array(
				'size'=>60,
				'maxlength'=>128,
				'class'=>'span2',
				'placeholder'=>'Email',
			)
		); ?>
		<?php echo $form->textField($model,'repeatEmail',
			array(
				'size'=>60,
				'maxlength'=>128,
				'class'=>'span2 pull-right',
				'placeholder'=>'Confirm Email',
			)
		); ?>
		<?php echo $form->error($model,'email'); ?>

		<?php echo $form->passwordField($model,'password',
			array(
				'size'=>60,
				'maxlength'=>128,
				'class'=>'span2',
				'placeholder'=>'Password',
			)
		); ?>
		<?php echo $form->passwordField($model,'repeatPassword',
			array(
				'size'=>60,
				'maxlength'=>128,
				'class'=>'span2 pull-right',
				'placeholder'=>'Confirm Password',
			)
		); ?>
		<?php echo $form->error($model,'password'); ?>

		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

		<?php echo CHtml::submitButton('Sign up', array(
			'class'=>'btn btn-large btn-primary btn-block button-padding button-margin',
		)); ?>
		
	<?php $this->endWidget(); ?>

</div><!-- form -->