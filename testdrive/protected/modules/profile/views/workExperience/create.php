<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */

$this->breadcrumbs=array(
	'Work Experiences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WorkExperience', 'url'=>array('index')),
	array('label'=>'Manage WorkExperience', 'url'=>array('admin')),
);
?>

<h1>Create WorkExperience</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>