<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->profileID,
);

$this->menu=array(
	array('label'=>'List Profile', 'url'=>array('index')),
	array('label'=>'Create Profile', 'url'=>array('create')),
	array('label'=>'Update Profile', 'url'=>array('update', 'id'=>$model->profileID)),
	array('label'=>'Delete Profile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->profileID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profile', 'url'=>array('admin')),
);
?>

<h1>View Profile #<?php echo $model->profileID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'profileID',
		'userID',
		'profilePic',
		'chapter',
		'intramural',
		'currentCity',
		'hometown',
		'relationship',
		'interests',
		'music',
		'movies',
		'tv',
		'books',
		'games',
		'phone',
		'facebook',
		'twitter',
		'website',
		'graduationMonth',
		'graduationYear',
		'gpa',
		'honors',
		'relevantCoursework',
	),
)); ?>
