<?php
/* @var $this FraternalFamilyController */
/* @var $model FraternalFamily */

$this->breadcrumbs=array(
	'Fraternal Families'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FraternalFamily', 'url'=>array('index')),
	array('label'=>'Create FraternalFamily', 'url'=>array('create')),
	array('label'=>'View FraternalFamily', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FraternalFamily', 'url'=>array('admin')),
);
?>

<h1>Update FraternalFamily <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>