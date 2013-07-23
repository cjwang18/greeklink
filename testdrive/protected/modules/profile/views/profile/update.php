<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->profileID=>array('view','id'=>$model->profileID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profile', 'url'=>array('index')),
	array('label'=>'Create Profile', 'url'=>array('create')),
	array('label'=>'View Profile', 'url'=>array('view', 'id'=>$model->profileID)),
	array('label'=>'Manage Profile', 'url'=>array('admin')),
);
?>

<h1>Update Profile <?php echo $model->profileID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>