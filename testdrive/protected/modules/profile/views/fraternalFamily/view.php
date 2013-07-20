<?php
/* @var $this FraternalFamilyController */
/* @var $model FraternalFamily */

$this->breadcrumbs=array(
	'Fraternal Families'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FraternalFamily', 'url'=>array('index')),
	array('label'=>'Create FraternalFamily', 'url'=>array('create')),
	array('label'=>'Update FraternalFamily', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FraternalFamily', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FraternalFamily', 'url'=>array('admin')),
);
?>

<h1>View FraternalFamily #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'profileID',
		'userID',
		'type',
	),
)); ?>
