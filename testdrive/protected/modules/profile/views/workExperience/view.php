<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */

$this->breadcrumbs=array(
	'Work Experiences'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List WorkExperience', 'url'=>array('index')),
	array('label'=>'Create WorkExperience', 'url'=>array('create')),
	array('label'=>'Update WorkExperience', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WorkExperience', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WorkExperience', 'url'=>array('admin')),
);
?>

<h1>View WorkExperience #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'profileID',
		'name',
		'description',
		'beginMonth',
		'beginYear',
		'endMonth',
		'endYear',
	),
)); ?>
