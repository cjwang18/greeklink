<?php
/* @var $this CommitteeInvolvementController */
/* @var $model CommitteeInvolvement */

$this->breadcrumbs=array(
	'Committee Involvements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommitteeInvolvement', 'url'=>array('index')),
	array('label'=>'Manage CommitteeInvolvement', 'url'=>array('admin')),
);
?>

<h1>Create CommitteeInvolvement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>