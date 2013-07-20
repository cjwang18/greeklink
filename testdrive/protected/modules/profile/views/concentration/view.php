<?php
/* @var $this ConcentrationController */
/* @var $model Concentration */

$this->breadcrumbs=array(
	'Concentrations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Concentration', 'url'=>array('index')),
	array('label'=>'Create Concentration', 'url'=>array('create')),
	array('label'=>'Update Concentration', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Concentration', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Concentration', 'url'=>array('admin')),
);
?>

<h1>View Concentration #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'profileID',
		'concentration',
		'beginSemester',
		'beginYear',
		'endSemester',
		'endYear',
	),
)); ?>
