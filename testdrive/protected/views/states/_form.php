<?php
/* @var $this StatesController */
/* @var $model States */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'states-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'stateAbbr'); ?>
		<?php echo $form->textField($model,'stateAbbr',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'stateAbbr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stateFull'); ?>
		<?php echo $form->textField($model,'stateFull',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'stateFull'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->