<?php
/* @var $this VoteController */
/* @var $model Vote */

$this->breadcrumbs=array(
	'Votes'=>array('index'),
	$model->voteID=>array('view','id'=>$model->voteID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vote', 'url'=>array('index')),
	array('label'=>'Create Vote', 'url'=>array('create')),
	array('label'=>'View Vote', 'url'=>array('view', 'id'=>$model->voteID)),
	array('label'=>'Manage Vote', 'url'=>array('admin')),
);
?>

<h1>Update Vote <?php echo $model->voteID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>