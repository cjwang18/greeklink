<?php
/* @var $this StatesController */
/* @var $model States */

$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->stateID=>array('view','id'=>$model->stateID),
	'Update',
);

$this->menu=array(
	array('label'=>'List States', 'url'=>array('index')),
	array('label'=>'Create States', 'url'=>array('create')),
	array('label'=>'View States', 'url'=>array('view', 'id'=>$model->stateID)),
	array('label'=>'Manage States', 'url'=>array('admin')),
);
?>

<h1>Update States <?php echo $model->stateID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>