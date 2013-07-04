<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php echo $form->dateField($model,'birthday'); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php 
			$genders = array(
				'f' => Yii::t('fim','Female'), 
				'm' => Yii::t('fim','Male'), 
			);
			echo $form->dropDownList($model, 'gender', $genders, 
				array(
					'prompt' => 'Select',
					'ajax' => array(
						'type' => 'POST',
						'url' => CController::createUrl('loadOrganizations'),
						'update' => '#organization_id',
					)
				)
			);
		?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization'); ?>
		<?php
			/*$orgs = CHtml::listData(Organizations::model()->findAll(array('order'=>'name')), 'orgID', 'name');
			echo $form->dropDownList($model,'organization', $orgs, array('empty'=>Yii::t('fim','Select')));*/
		?>
		<?php echo CHtml::dropDownList('organization_id','organization_id', array(), array('empty'=>Yii::t('fim','Select'))); ?>
		<?php echo $form->error($model,'organization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'initiationYear'); ?>
		<?php echo $form->textField($model,'initiationYear',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'initiationYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php 
			$states = CHtml::listData(States::model()->findAll(), 'stateID', 'stateAbbr');
			echo $form->dropDownList($model, 'state', $states, 
				array(
					'prompt' => 'Select',
					'ajax' => array(
						'type' => 'POST',
						'url' => CController::createUrl('loadUniversities'),
						'update' => '#university_id',
						)
					)
				);
		?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university'); ?>
		<?php echo CHtml::dropDownList('university_id','university_id', array(), array('empty'=>Yii::t('fim','Select'))); ?>
		<?php echo $form->error($model,'university'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->textField($model,'repeatEmail',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->passwordField($model,'repeatPassword',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
		

<?php $this->endWidget(); ?>

</div><!-- form -->