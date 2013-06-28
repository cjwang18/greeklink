<?php
/* @var $this UniversitiesController */
/* @var $model Universities */

$this->breadcrumbs=array(
	'Universities'=>array('index'),
	$model->name=>array('view','id'=>$model->universityID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Universities', 'url'=>array('index')),
	array('label'=>'Create Universities', 'url'=>array('create')),
	array('label'=>'View Universities', 'url'=>array('view', 'id'=>$model->universityID)),
	array('label'=>'Manage Universities', 'url'=>array('admin')),
);
?>

<h1>Update Universities <?php echo $model->universityID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>