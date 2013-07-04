<?php
/* @var $this StatesController */
/* @var $model States */

$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->stateID,
);

$this->menu=array(
	array('label'=>'List States', 'url'=>array('index')),
	array('label'=>'Create States', 'url'=>array('create')),
	array('label'=>'Update States', 'url'=>array('update', 'id'=>$model->stateID)),
	array('label'=>'Delete States', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->stateID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage States', 'url'=>array('admin')),
);
?>

<h1>View States #<?php echo $model->stateID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'stateID',
		'stateAbbr',
		'stateFull',
	),
)); ?>
