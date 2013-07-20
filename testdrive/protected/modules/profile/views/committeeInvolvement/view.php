<?php
/* @var $this CommitteeInvolvementController */
/* @var $model CommitteeInvolvement */

$this->breadcrumbs=array(
	'Committee Involvements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CommitteeInvolvement', 'url'=>array('index')),
	array('label'=>'Create CommitteeInvolvement', 'url'=>array('create')),
	array('label'=>'Update CommitteeInvolvement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CommitteeInvolvement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommitteeInvolvement', 'url'=>array('admin')),
);
?>

<h1>View CommitteeInvolvement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'profileID',
		'name',
		'beginSemester',
		'beginYear',
		'endSemester',
		'endYear',
	),
)); ?>
