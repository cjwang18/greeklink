<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'organization'); ?>
		<?php 
			//echo $form->textField($model,'organization',array('size'=>60,'maxlength'=>128)); 
			$orgs = CHtml::listData(Organizations::model()->findAll(), 'orgID', 'name');
			echo $form->dropDownList($model, 'organization', $orgs, 
				array(
					'prompt' => 'All Organizations',
					'class'=>'form-topMargin form-su-org'
					)
				);
		?>
	</div>

	<!-- <div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php 
			$states = CHtml::listData(States::model()->findAll(), 'stateID', 'stateAbbr');
			echo $form->dropDownList($model, 'state', $states, 
				array(
					'prompt' => 'All States',
					'ajax' => array(
						'type' => 'POST',
						'url' => CController::createUrl('loadUniversities'),
						'update' => '#university_id',
						),
					'class'=>'form-topMargin form-su-state'
					)
				);
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'university'); ?>
		<?php //echo $form->textField($model,'university',array('size'=>60,'maxlength'=>128)); ?>
		<?php
			$uniArr = array();
			if (isset($_POST['Users']['state']))
				$uniArr = $this->getUniversitiesList($_POST['Users']['state']);

			echo CHtml::activeDropDownList($model,'university', $uniArr, 
			array(
				'empty'=>'All Universities',
				'class'=>'form-topMargin form-su-university',
				'id'=>'university_id'
			)
		); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>2,'maxlength'=>2)); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->label($model,'initiationYear'); ?>
		<?php echo $form->textField($model,'initiationYear',array('size'=>4,'maxlength'=>4)); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'graduationYearSearch'); ?>
		<?php echo $form->textField($model,'graduationYearSearch',array('size'=>60,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'concentrationSearch'); ?>
		<?php echo $form->textField($model,'concentrationSearch',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->