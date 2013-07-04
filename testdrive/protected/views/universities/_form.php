<?php
/* @var $this UniversitiesController */
/* @var $model Universities */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'universities-form',
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
		<?php echo $form->labelEx($model,'state'); ?>
		<?php 
			$states = CHtml::listData(States::model()->findAll(), 'stateID', 'stateAbbr');
			echo $form->dropDownList($model, 'state', $states, array('empty'=>Yii::t('fim','Select')));
		?>
		<?php //echo $form->dropDownList($model,'state', CHtml::listData(States::model()->findAll(), 'stateID', 'stateAbbr')); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->