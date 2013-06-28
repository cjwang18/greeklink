<?php
/* @var $this UniversitiesController */
/* @var $model Universities */

$this->breadcrumbs=array(
	'Universities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Universities', 'url'=>array('index')),
	array('label'=>'Create Universities', 'url'=>array('create')),
	array('label'=>'Update Universities', 'url'=>array('update', 'id'=>$model->universityID)),
	array('label'=>'Delete Universities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->universityID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Universities', 'url'=>array('admin')),
);
?>

<h1>View Universities #<?php echo $model->universityID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'universityID',
		'name',
		'state',
	),
)); ?>
