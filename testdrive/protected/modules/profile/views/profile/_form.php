<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php 
		if ($model->profilePic != '') {
			echo '<div class="row">';
			echo CHtml::image(Yii::app()->request->baseUrl.'/images/profilePics/'.$model->profilePic,"image",array("width"=>200));
			echo '</div>';
		}
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'profilePic'); ?>
		<?php echo $form->fileField($model,'profilePic'); ?>
		<?php echo $form->error($model,'profilePic'); ?>
	</div>

	<div class="row">
		<br><b>GREEK</b><br><br>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chapter'); ?>
		<?php echo $form->textField($model,'chapter',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'chapter'); ?>
	</div>

	<!-- Begin Position -->
	<div class="row">
		<br><hr><b>Position(s)</b> - 
		<?php echo CHtml::link('Add', '#', array('class' => 'loadByAjax', 'id' => 'position')); ?>
	</div>
	
	<div id="positions">
		<?php
			$index = 0;
			foreach ($model->profilesPositions as $id => $position):
				$this->renderPartial('/position/_form', array(
					'model' => $position,
					'index' => $id,
					'display' => 'block'
				));
				$index++;
			endforeach;
		?>
	</div>

	<div class="row">
		<br><hr>
	</div>
	<!-- End Position -->

	<!-- Begin CommitteeInvolvement -->
	<div class="row">
		<b>Committee Involvement</b> - 
		<?php echo CHtml::link('Add', '#', array('class' => 'loadByAjax', 'id' => 'committeeInvolvement')); ?>
	</div>

	<div id="committeeInvolvements">
		<?php
			$index = 0;
			foreach ($model->profilesCommitteeInvolvements as $id => $ci):
				$this->renderPartial('/committeeInvolvement/_form', array(
					'model' => $ci,
					'index' => $id,
					'display' => 'block'
				));
				$index++;
			endforeach;
		?>
	</div>

	<div class="row">
		<br><hr>
	</div>
	<!-- End CommitteeInvolvement -->

	<div class="row">
		<?php echo $form->labelEx($model,'intramural'); ?>
		<?php echo $form->textArea($model,'intramural',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'intramural'); ?>
	</div>

	<!-- CJ20130723 Skipping over Fraternal Family until Links are implemented -->
	<div class="row">
		<b>Fraternal Family</b>
	</div>

	<div class="row">
		<br><b>PERSONAL</b><br><br>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currentCity'); ?>
		<?php echo $form->textField($model,'currentCity',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'currentCity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hometown'); ?>
		<?php echo $form->textField($model,'hometown',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'hometown'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relationship'); ?>
		<?php echo $form->textField($model,'relationship',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'relationship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interests'); ?>
		<?php echo $form->textArea($model,'interests',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'interests'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'music'); ?>
		<?php echo $form->textArea($model,'music',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'music'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'movies'); ?>
		<?php echo $form->textArea($model,'movies',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'movies'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tv'); ?>
		<?php echo $form->textArea($model,'tv',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'books'); ?>
		<?php echo $form->textArea($model,'books',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'books'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'games'); ?>
		<?php echo $form->textArea($model,'games',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'games'); ?>
	</div>

	<div class="row">
		<br><b>CONTACT</b><br><br>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twitter'); ?>
		<?php echo $form->textField($model,'twitter',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'twitter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<br><b>EDUCATION</b><br><br>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graduationMonth'); ?>
		<?php echo $form->dropDownList($model, 'graduationMonth', $model->monthOptions, array('prompt' => 'Select Month')); ?>
		<?php echo $form->error($model,'graduationMonth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graduationYear'); ?>
		<?php echo $form->textField($model,'graduationYear',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'graduationYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gpa'); ?>
		<?php echo $form->textField($model,'gpa',array('size'=>3,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'gpa'); ?>
	</div>

	<!-- Begin Concentration -->
	<div class="row">
		<br><hr><b>Concentration(s)</b> - 
		<?php echo CHtml::link('Add', '#', array('class' => 'loadByAjax', 'id' => 'concentration')); ?>
	</div>

	<div id="concentrations">
		<?php
			$index = 0;
			foreach ($model->profilesConcentrations as $id => $c):
				$this->renderPartial('/concentration/_form', array(
					'model' => $c,
					'index' => $id,
					'display' => 'block'
				));
				$index++;
			endforeach;
		?>
	</div>

	<div class="row">
		<br><hr>
	</div>
	<!-- End Concentration -->

	<div class="row">
		<?php echo $form->labelEx($model,'honors'); ?>
		<?php echo $form->textArea($model,'honors',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'honors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relevantCoursework'); ?>
		<?php echo $form->textArea($model,'relevantCoursework',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'relevantCoursework'); ?>
	</div>

	<!-- Begin WorkExperience -->
	<div class="row">
		<br><hr><b>WORK EXPERIENCE</b> - 
		<?php echo CHtml::link('Add', '#', array('class' => 'loadByAjax', 'id' => 'workExperience')); ?>
	</div>

	<div id="workExperiences">
		<?php
			$index = 0;
			foreach ($model->profilesWorkExperiences as $id => $we):
				$this->renderPartial('/workExperience/_form', array(
					'model' => $we,
					'index' => $id,
					'display' => 'block'
				));
				$index++;
			endforeach;
		?>
	</div>

	<div class="row">
		<br><hr>
	</div>
	<!-- End WorkExperience -->

	<!-- Begin Activity -->
	<div class="row">
		<b>ACTIVITIES</b> - 
		<?php echo CHtml::link('Add', '#', array('class' => 'loadByAjax', 'id' => 'activity')); ?>
	</div>

	<div id="activitys">
		<?php
			$index = 0;
			foreach ($model->profilesActivities as $id => $a):
				$this->renderPartial('/activity/_form', array(
					'model' => $a,
					'index' => $id,
					'display' => 'block'
				));
				$index++;
			endforeach;
		?>
	</div>

	<div class="row">
		<br><hr>
	</div>
	<!-- End Activity -->

	<!-- Begin Skill -->
	<div class="row">
		<b>SKILLS</b> - 
		<?php echo CHtml::link('Add', '#', array('class' => 'loadByAjax', 'id' => 'skill')); ?>
	</div>

	<div id="skills">
		<?php
			$index = 0;
			foreach ($model->profilesSkills as $id => $s):
				$this->renderPartial('/skill/_form', array(
					'model' => $s,
					'index' => $id,
					'display' => 'block'
				));
				$index++;
			endforeach;
		?>
	</div>

	<div class="row">
		<br><hr>
	</div>
	<!-- End Skill -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
Yii::app()->clientScript->registerCoreScript('jquery');

Yii::app()->clientScript->registerScript('loadposition', '
var _index = ' . $index . ';
$(".loadByAjax").click(function(e){
    e.preventDefault();
    var _loadFor = $(this).attr("id");
    var _url = "' . Yii::app()->controller->createUrl("loadByAjax") . '?loadFor="+_loadFor+"&index="+_index;
    console.log(_url);
    $.ajax({
        url: _url,
        success:function(response){
            $("#"+_loadFor+"s").append(response);
            $("#"+_loadFor+"s .instance").last().animate({
                opacity : 1, 
                left: "+50", 
                height: "auto"
            });
        }
    });
    _index++;
});
', CClientScript::POS_END);

Yii::app()->clientScript->registerScript('presentToggle', "
$(document).ready(function() {
	$('.presentCB').each(function() {
		if ($(this).is(':checked')) {
			$(this).parent().parent().find('.endDate').hide();
		}
	});
});

function presentToggle(cb)
{
	if ($(cb).is(':checked')) {
		$(cb).parent().parent().find('.endDate').hide();
		$(cb).parent().parent().find('.endDateField').each(function() {
			$(this).val('');
		});
	}
	else
		$(cb).parent().parent().find('.endDate').show();
}
", CClientScript::POS_END);

Yii::app()->clientScript->registerScript('deleteChild', "
function deleteChild(elm, index)
{
	element=$(elm).parent().parent();
	/* animate div */
	$(element).animate(
	{
		opacity: 0.25, 
		left: '+=50', 
		height: 'toggle'
	}, 500,
	function() {
		/* remove div */
		$(element).remove();
	});
}", CClientScript::POS_END);
?>