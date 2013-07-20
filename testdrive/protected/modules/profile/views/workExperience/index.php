<?php
/* @var $this WorkExperienceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Work Experiences',
);

$this->menu=array(
	array('label'=>'Create WorkExperience', 'url'=>array('create')),
	array('label'=>'Manage WorkExperience', 'url'=>array('admin')),
);
?>

<h1>Work Experiences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
