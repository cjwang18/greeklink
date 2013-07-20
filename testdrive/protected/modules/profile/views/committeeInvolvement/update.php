<?php
/* @var $this CommitteeInvolvementController */
/* @var $model CommitteeInvolvement */

$this->breadcrumbs=array(
	'Committee Involvements'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommitteeInvolvement', 'url'=>array('index')),
	array('label'=>'Create CommitteeInvolvement', 'url'=>array('create')),
	array('label'=>'View CommitteeInvolvement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CommitteeInvolvement', 'url'=>array('admin')),
);
?>

<h1>Update CommitteeInvolvement <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>